<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest;
use App\Http\Requests\Admin\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function showBooks(Request $request)
    {
        $books = Book::paginate(10);
        $data = [
            'paginator' => $books,
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

    public function addBook(BookRequest $request)
    {
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

        if (!$book)
            return back()->with('error', 'An error occurred while creating a new book');

        if ($request->hasFile('image')) {
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

    public function saveEditBook(UpdateBookRequest $request)
    {
        $input = $request->validated();
        $bookId = $input['id'];
        $editBook = Book::find($bookId);
        $data = [
            'name' => $input['name'],
            'description' => $input['description'],
            'price' => $input['price'],
            'stock' => $input['stock'],
            'publishDate' => $input['publishDate'],
            'author_id' => $input['author_id'],
            'category_id' => $input['category_id'],
            'publisher_id' => $input['publisher_id'],
        ];
        if (!$editBook->update($data))
            return back()->with('error', 'An error occurred while updating book');
        if ($request->hasFile('image')) {
            $uploadPath = 'books/' . $editBook->id;
            foreach ($request->file('image') as $imageFile) {
                $imagePath = $imageFile->store($uploadPath);
                $editBook->book_imgages()->create([
                    'image_path' => $imagePath,
                    'book_id' => $editBook->id,
                ]);
            }
        }

        return redirect()->route('admin.books')->with('success', 'Update book successfully');
    }

    public function deleteBookImage(Request $request)
    {
        $imageId = $request->input('id');
        $image = BookImage::find($imageId);
        if ($image) {
            if ($image->delete()) {
                Storage::delete($image->image_path);
                return response()->json(
                    [
                        'message' => 'Image has been deleted successfully.'
                    ],
                    Response::HTTP_OK
                );
            } else {
                return response()->json(
                    [
                        'message' => 'An error occurred, the image cannot be deleted'
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }
        }
        return response()->json(
            [
                'message' => 'Image is not exist',
            ],
            Response::HTTP_NOT_FOUND
        );
    }
}
