<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function showBooks(Request $request)
    {
        $books = Book::paginate(10);
        $bookImages = BookImage::all();
        $data = [
            'paginator' => $books,
            'bookImages' => $bookImages,
        ];
        if (request()->ajax()) {
            $html = view('admin.books.books-table', $data)->render();
            return response()->json(['data' => $html]);
        }
        return view('admin.books.books', $data);
    }

    public function showAddBook(Request $request)
    {
        $categories = Category::get();
        $authors = Author::get();
        $publishers = Publisher::get();
        $data = [
            'categories' => $categories,
            'authors' => $authors,
            'publishers' => $publishers,
        ];
        if ($request->query('id')) {
            $bookId = $request->query('id');
            $book = Book::find($bookId);
            if ($book) {
                $data['editBook'] = $book;
                return view('admin.books.add-book', $data);
            } else
                return back()->with('error', 'Book id is incorrect');
        }
        return view('admin.books.add-book', $data);
    }

    public function addBook(BookRequest $request){
        $input = $request->validated();

        $category = Category::findOrFail($input['category_id']);

        $book = $category->books()->create([
        'name' => $input['name'],
        'description' => $input['description'],
        'price' => $input['price'],
        'stock' => $input['stock'],
        'publishDate' => $input['publishDate'],
        'author_id' => $input['author_id'],
        'category_id' => $input['category_id'],
        'publisher_id' => $input['publisher_id'],
        ]);

        if(!$book)
            return back()->with('error', 'An error occurred while creating a new book');
        
        if($request->hasFile('image')){
            $uploadPath = 'books/' . $book->id;
            foreach ($request->file('image') as $imageFile) {
                $imagePath = $imageFile->store($uploadPath);
                $book->book_imgages()->create([
                    'image_path' => $imagePath,
                    'book_id' => $book->id,
                ]);
            }
        }

        return redirect()->route('admin.books')->with('success', 'Add new book successfully');
        
    }
}
