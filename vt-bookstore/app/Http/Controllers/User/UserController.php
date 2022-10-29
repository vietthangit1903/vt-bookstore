<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return back()->with('success', 'Your address was successfully updated');
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
}
