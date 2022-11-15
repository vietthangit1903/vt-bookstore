<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getView(){
        return view('home');
    }

    public function categoriesList(Request $request){
        $categories = Category::get();
        return response()->json($categories);
    }
}
