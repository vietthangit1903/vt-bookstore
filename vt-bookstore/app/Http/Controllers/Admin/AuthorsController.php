<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorsRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorsController extends Controller
{
    public function showAuthors(Request $request)
    {
        $authors = Author::paginate(5);
        if (request()->ajax()) {
            $html = view('admin.authors.authors-table', ['paginator' => $authors])->render();
            return response()->json(['data' => $html]);
        } else {
            if ($request->query('id')) {
                $authorId = $request->query('id');
                $author = Author::find($authorId);
                if ($author) {
                    $data = [
                        'paginator' => $authors,
                        'editAuthor' => $author,
                    ];
                    return view('admin.authors.authors', $data);
                } else
                    return back()->with('error', 'Author id is incorrect');
            }
            return view('admin.authors.authors', ['paginator' => $authors]);
        }
    }

    public function saveAuthor(AuthorsRequest $request)
    {
        $input = $request->validated();
        $name = $input['name'];
        $description = $input['description'];

        if ($request->query('id')) {
            $authorId = $input['id'];
            $author = Author::find($authorId);
            if ($author) {
                $author->name = $name;
                $author->description = $description;
                if ($author->save()) {
                    return redirect()->route('admin.authors')->with('success', 'Author information has been updated successfully');
                }
                return back()->with('error', 'There was an error while saving');
            }
            return back()->with('error', 'Author information id is incorrect');
        }

        $newAuthor = new Author();
        $newAuthor->name = $name;
        $newAuthor->description = $description;
        if ($newAuthor->save()) {
            return redirect()->route('admin.authors')->with('success', 'Author information has been saved');
        }
        return back()->with('error', 'There was an error while saving');
    }

    public function deleteAuthor(Request $request){
        $authorId = $request->input('id');
        $author = Author::find($authorId);
        if($author){
            if ($author->delete()) {
                return response()->json(
                    [
                        'message' => $author->name . ' author has been deleted successfully.'
                    ],
                    Response::HTTP_OK
                );  
            } else {
                return response()->json(
                    [
                        'message' => 'An error occurred, the author cannot be deleted'
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }
        }
        return response()->json(
            [
                'message' => 'Author is not exist',
            ],
            Response::HTTP_NOT_FOUND
        );
    }
}
