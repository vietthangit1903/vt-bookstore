<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function ajaxCart(){
        if(!Auth::check()){
            $html = view('layout.cart-not-auth-body')->render();
            return response()->json(['data' => $html]);
        }
        else{
            $cartDetails = CartDetail::where('user_id', Auth::id())->get();
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
}
