<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    public function showCategories(Request $request)
    {
        $categories = Category::paginate(10);
        if (request()->ajax()) {
            $html = view('admin.categories.categories-table', ['paginator' => $categories])->render();
            return response()->json(['data' => $html]);
        } else {
            if ($request->query('id')) {
                $categoryId = $request->query('id');
                $category = Category::find($categoryId);
                if ($category) {
                    $data = [
                        'paginator' => $categories,
                        'editCategory' => $category,
                    ];
                    return view('admin.categories.categories', $data);
                } else
                    return back()->with('error', 'Book category id is incorrect');
            }
            return view('admin.categories.categories', ['paginator' => $categories]);
        }
    }

    public function saveCategory(AddCategoryRequest $request)
    {
        $input = $request->validated();
        $name = $input['name'];

        if ($request->query('id')) {
            $categoryId = $request->query('id');
            $category = Category::find($categoryId);
            if ($category) {
                $category->name = $name;
                if ($category->save()) {
                    return redirect()->route('admin.categories')->with('success', 'Book category has been updated successfully');
                }
                return back()->with('error', 'There was an error while saving');
            }
            return back()->with('error', 'Book category id is incorrect');
        }

        $newCategory = new Category();
        $newCategory->name = $name;
        if ($newCategory->save()) {
            return redirect()->route('admin.categories')->with('success', 'Book category has been saved');
        }
        return back()->with('error', 'There was an error while saving');
    }

    public function deleteCategory(Request $request){
        $categoryId = $request->input('id');
        $category = Category::find($categoryId);
        if($category){
            if ($category->delete()) {
                return response()->json(
                    [
                        'message' => $category->name . ' category has been deleted successfully.'
                    ],
                    Response::HTTP_OK
                );  
            } else {
                return response()->json(
                    [
                        'message' => 'An error occurred, the category cannot be deleted'
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }
        }
        return response()->json(
            [
                'message' => 'Category is not exist',
            ],
            Response::HTTP_NOT_FOUND
        );
    }
}
