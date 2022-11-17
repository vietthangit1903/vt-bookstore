<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PublishersRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublishersController extends Controller
{
    public function showPublishers(Request $request)
    {
        $publishers = Publisher::paginate(10);
        if (request()->ajax()) {
            $html = view('admin.publishers.publishers-table', ['paginator' => $publishers])->render();
            return response()->json(['data' => $html]);
        } else {
            if ($request->query('id')) {
                $publisherId = $request->query('id');
                $publisher = Publisher::find($publisherId);
                if ($publisher) {
                    $data = [
                        'paginator' => $publishers,
                        'editPublisher' => $publisher,
                    ];
                    return view('admin.publishers.publishers', $data);
                } else
                    return back()->with('error', 'Publisher\'s id is incorrect');
            }
            return view('admin.publishers.publishers', ['paginator' => $publishers]);
        }
    }

    public function savePublisher(PublishersRequest $request)
    {
        $input = $request->validated();
        $name = $input['name'];

        if ($request->query('id')) {
            $publisherId = $input['id'];
            $publisher = Publisher::find($publisherId);
            if ($publisher) {
                $publisher->name = $name;
                if ($publisher->save()) {
                    return redirect()->route('admin.publishers')->with('success', 'Publisher has been updated successfully');
                }
                return back()->with('error', 'There was an error while saving');
            }
            return back()->with('error', 'Publisher\'s id is incorrect');
        }

        $newPublisher = new Publisher();
        $newPublisher->name = $name;
        if ($newPublisher->save()) {
            return redirect()->route('admin.publishers')->with('success', 'New publisher has been saved');
        }
        return back()->with('error', 'There was an error while saving');
    }

    public function deletePublisher(Request $request){
        $publisherId = $request->input('id');
        $publisher = Publisher::find($publisherId);
        if($publisher){
            if ($publisher->delete()) {
                return response()->json(
                    [
                        'message' => $publisher->name . ' publisher has been deleted successfully.'
                    ],
                    Response::HTTP_OK
                );  
            } else {
                return response()->json(
                    [
                        'message' => 'An error occurred, the publisher cannot be deleted'
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }
        }
        return response()->json(
            [
                'message' => 'Publisher is not exist',
            ],
            Response::HTTP_NOT_FOUND
        );
    }
}
