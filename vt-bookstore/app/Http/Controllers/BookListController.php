<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookListController extends Controller
{
    public function showBookList(Request $request)
    {
        $perPage = $request->query('per-page');
        if (!$perPage)
            $perPage = 4;
        $sort = $request->query('sort');
        $bookByCategory = null;
        if (!$sort)
            $sort = 'default';
        switch ($sort) {
            case 'date':
                $bookByCategory = Book::orderBy('created_at', 'desc')->paginate($perPage);
                break;
            case 'price':
                $bookByCategory = Book::orderBy('price', 'asc')->paginate($perPage);
                break;

            case 'price-desc':
                $bookByCategory = Book::orderBy('price', 'desc')->paginate($perPage);
                break;

            default:
                $bookByCategory = Book::paginate($perPage);
                break;
        }
        $bookByCategory->appends(['sort' => $sort, 'per-page' => $perPage]);
        return view('book-list', ['paginator' => $bookByCategory, 'perPage' => $perPage, 'sort' => $sort]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$request->ajax()) {
            $perPage = $request->query('per-page');
            if (!$perPage)
                $perPage = 4;
            $sort = $request->query('sort');
            $bookByCategory = null;
            if (!$sort)
                $sort = 'default';
            switch ($sort) {
                case 'date':
                    $bookByCategory = Book::where('name', 'like', '%' . $keyword . '%')
                        ->orderBy('created_at', 'desc')->paginate($perPage);
                    break;
                case 'price':
                    $bookByCategory = Book::where('name', 'like', '%' . $keyword . '%')
                        ->orderBy('price', 'asc')->paginate($perPage);
                    break;

                case 'price-desc':
                    $bookByCategory = Book::where('name', 'like', '%' . $keyword . '%')
                        ->orderBy('price', 'desc')->paginate($perPage);
                    break;

                default:
                    $bookByCategory = Book::where('name', 'like', '%' . $keyword . '%')
                        ->paginate($perPage);
                    break;
            }
            $bookByCategory->appends(['sort' => $sort, 'per-page' => $perPage, 'keyword' => $keyword]);
            return view('book-list', ['paginator' => $bookByCategory, 'perPage' => $perPage, 'sort' => $sort, 'keyword' => $keyword]);
        }
        else{
            $bookByCategory = Book::where('name', 'like', '%' . $keyword . '%')->limit(5)->get();
            $html = view('layout.live-search', ['books' => $bookByCategory])->render();
            return response()->json(['data' => $html]);
        }
    }

    public function bookByCategory(Request $request, $id){
        $category = Category::find($id);
        $perPage = $request->query('per-page');
        if (!$perPage)
            $perPage = 4;
        $sort = $request->query('sort');
        $bookByCategory = null;
        if (!$sort)
            $sort = 'default';
        switch ($sort) {
            case 'date':
                $bookByCategory = Book::where('category_id', $id)->orderBy('created_at', 'desc')->paginate($perPage);
                break;
            case 'price':
                $bookByCategory = Book::where('category_id', $id)->orderBy('price', 'asc')->paginate($perPage);
                break;

            case 'price-desc':
                $bookByCategory = Book::where('category_id', $id)->orderBy('price', 'desc')->paginate($perPage);
                break;

            default:
                $bookByCategory = Book::where('category_id', $id)->paginate($perPage);
                break;
        }
        $bookByCategory->appends(['sort' => $sort, 'per-page' => $perPage]);
        return view('book-list', ['paginator' => $bookByCategory, 'perPage' => $perPage, 'sort' => $sort, 'category' => $category]);
    }
}
