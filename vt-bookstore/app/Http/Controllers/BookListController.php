<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookListController extends Controller
{
    public function showBookList(Request $request)
    {
        $perPage = $request->query('per-page');
        if (!$perPage)
            $perPage = 4;
        $sort = $request->query('sort');
        $sortBooks = null;
        if (!$sort)
            $sort = 'default';
        switch ($sort) {
            case 'date':
                $sortBooks = Book::orderBy('created_at', 'desc')->paginate($perPage);
                break;
            case 'price':
                $sortBooks = Book::orderBy('price', 'asc')->paginate($perPage);
                break;

            case 'price-desc':
                $sortBooks = Book::orderBy('price', 'desc')->paginate($perPage);
                break;

            default:
                $sortBooks = Book::paginate($perPage);
                break;
        }
        $sortBooks->appends(['sort' => $sort, 'per-page' => $perPage]);
        return view('book-list', ['paginator' => $sortBooks, 'perPage' => $perPage, 'sort' => $sort]);
    }
}
