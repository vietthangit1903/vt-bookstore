<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    public function ajaxCart()
    {
        if (!Auth::check()) {
            $html = view('layout.cart-not-auth-body')->render();
            return response()->json(['data' => $html]);
        } else {
            $user = Auth::user();
            // $cartDetails = CartDetail::where('user_id', Auth::id())->get();
            $cartDetails = CartDetail::whereBelongsTo($user)->get();
            $total = 0;
            foreach ($cartDetails as $cartDetail) {
                $total += $cartDetail->price * $cartDetail->quantity;
            }
            $amount = $cartDetails->count();
            $data = [
                'cartDetails' => $cartDetails,
                'amount' => $amount,
                'total' => $total
            ];
            $html = view('layout.cart-auth-body', $data)->render();
            return response()->json(['data' => $html, 'amount' => $amount, 'total' => $total]);
        }
    }

    public function showCartView(Request $request)
    {
        $user = Auth::user();
        // $cartDetails = CartDetail::where('user_id', Auth::id())->get();
        $cartDetails = CartDetail::whereBelongsTo($user)->get();
        $total = 0;
        foreach ($cartDetails as $cartDetail) {
            $total += $cartDetail->price * $cartDetail->quantity;
        }
        $amount = $cartDetails->count();
        $data = [
            'cartDetails' => $cartDetails,
            'amount' => $amount,
            'total' => $total
        ];
        if($request->ajax()){
            $html = view('user.cart-body', $data)->render();
            return response()->json(['data' => $html]);
        }
        return view('user.cart', $data);
    }

    public function deleteSingleCartDetail(Request $request)
    {
        $cartDetailId = $request->input('id');
        $cartDetail = CartDetail::find($cartDetailId);
        if ($cartDetail) {
            if ($cartDetail->delete()) {
                $book = Book::find($cartDetail->book_id);
                $book->stock += $cartDetail->quantity;
                $book->save();
                return response()->json(
                    [],
                    Response::HTTP_OK
                );
            } else {
                return response()->json(
                    [
                        'message' => 'An error occurred, the cart detail cannot be deleted'
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }
        }
        return response()->json(
            [
                'message' => 'This cart detail is not exist',
            ],
            Response::HTTP_NOT_FOUND
        );
    }

    public function updateCartDetail(Request $request){
        if($request->ajax()){
            $cartDetailId = $request->input('id');
            $quantity = $request->input('quantity');
            $cartDetail = CartDetail::find($cartDetailId);
            $value = $quantity - $cartDetail->quantity;
            $book = Book::find($cartDetail->book_id);
            $book->stock -= $value;
            $cartDetail->quantity = $quantity;
            if($book->save() && $cartDetail->save()){
                return response()->json(
                    [],
                    Response::HTTP_OK
                );
            }
            else{
                return response()->json(
                    [
                        'message' => 'An error occurred, the cart detail cannot be updated.'
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }
        }
    }

    public function addSingleBook(Request $request)
    {
        if (Auth::check()) {
            $bookId = $request->input('id');
            $quantity = $request->input('quantity');
            $book = Book::find($bookId);
            if ($book->stock >= $quantity) {
                $user = Auth::user();
                $cartDetails = CartDetail::whereBelongsTo($user)->get();
                $existCartDetail = null;
                foreach ($cartDetails as $cartDetail) {
                    if ($cartDetail->book_id == $bookId) {
                        $existCartDetail = $cartDetail;
                        break;
                    }
                }
                if ($existCartDetail) {
                    $existCartDetail->quantity += $quantity;
                    $existCartDetail->save();
                    $book->stock -= $quantity;
                    $book->save();
                } else {
                    $newCartDetail = new CartDetail();
                    $newCartDetail->quantity = $quantity;
                    $newCartDetail->price = $book->price;
                    $newCartDetail->book_id = $book->id;
                    $newCartDetail->user_id = $user->id;
                    $newCartDetail->save();
                    $book->stock -= $quantity;
                    $book->save();
                }

                return response()->json(
                    [],
                    Response::HTTP_OK
                );
            }
            return response()->json(
                [
                    'message' => 'This book is out of stock'
                ],
                Response::HTTP_OK
            );
        }
        return response()->json(
            [],
            Response::HTTP_UNAUTHORIZED
        );
    }
}
