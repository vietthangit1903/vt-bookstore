<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function showCategories(){
        $categories = Category::paginate(3);
        // dd($categories);
        return view('admin.categories.categories', ['paginator'=>$categories]);
    }
}
