<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function showBook(Request $request, $book_id)
    {
        $book = Book::find($book_id);
        $bookSameCategory = Book::where('category_id', $book->category_id)
            ->where('id', '<>', $book_id)->get();
        // dd($bookSameCategory);
        return view('book-detail', ['book' => $book, 'bookSameCategory' => $bookSameCategory]);
    }
}
