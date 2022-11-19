<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getView(){
        $books = Book::offset(0)
        ->limit(8)
        ->get();
        $data = [
            'books' => $books,
        ];
        return view('home', $data);
    }

    public function categoriesList(Request $request){
        $categories = Category::get();
        return response()->json($categories);
    }
}
