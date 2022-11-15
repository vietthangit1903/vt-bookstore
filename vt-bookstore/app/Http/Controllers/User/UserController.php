<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddressRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function showUserAccount()
    {
        $user = User::find(Auth::id());
        $user_addresses = Address::where('user_id', $user->id)->get();
        // dd($user_addresses);
        $data = [
            'user' => $user,
            'user_addresses' => $user_addresses,
        ];
        return view('user.my-account', $data);
    }

    public function showAddressView(Request $request)
    {
        if ($request->query('id')) {
            $addressId = $request->query('id');
            $address = Address::where(['id' => $addressId, 'user_id' => Auth::id()])->first();
            if ($address)
                return view('user.address', ['address' => $address]);
            else
                return back()->with('error', 'Your address id is incorrect');
        } else
            return view('user.address');
    }

    public function saveAddress(AddressRequest $addressRequest)
    {
        $input = $addressRequest->validated();
        $addressId = $addressRequest->query('id');
        if ($addressId){
            $address = Address::where(['id' => $addressId, 'user_id' => Auth::id()])->first();
            if($address){
                $address->name = $input['addressName'];
            $address->address = $input['addressDetail'];
            $address->save();
            return redirect()->route('my-account')->with('success', 'Your address was successfully updated');
            }
            else
                return back()->with('error', 'Can not find address you are looking for');
        }
        else{
            $newAddress = Address::create([
                'name' => $input['addressName'],
                'address' => $input['addressDetail'],
                'user_id' => Auth::id(),
            ]);
            return redirect()->route('my-account')->with('success', 'Your address has been created successfully');
        }
              
    }

    public function deleteAddress(Request $request) {
        $addressId = $request->input('id');
        $address = Address::where(['id' => $addressId, 'user_id' => Auth::id()])->first();
        if($address){
            if($address->delete()){
                return response()->json([
                    'message' => $address->name . ' has been deleted successfully!'
                ], Response::HTTP_OK);
            }
            else{
                return response()->json([
                    'message' => $address->name . ' can not be deleted successfully!'
                ], Response::HTTP_BAD_REQUEST);
            }
        }
        return response()->json([
            'message' => $address->name . ' does not exist!'
        ], Response::HTTP_NOT_FOUND);
    }

    public function updateUserInfor(UpdateUserRequest $request){
        $user = User::find(Auth::id());
        $input = $request->validated();
        $fullName = $input['fullName'];
        $dob = $input['dob'];
        $data = [
            'fullName' => $fullName,
            'dob' => $dob,
        ];
        if($request->hasFile('image')){
            if($user->image != 'images/default-avt.png')
                Storage::delete($user->image);
            $image = $request->file('image')->store('images');
            $data['image'] = $image;
        }
        if($user->update($data)){
            return redirect()->route('my-account')->with('success','Your account has been updated');
        }
        return back()->withInput()->with('error','Something went wrong while updating your account');

    }
}
