<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\GuestRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class GuestRegisterController extends Controller
{
    public function RegisterGuest(GuestRegisterRequest $guestRegisterRequest){
        $input = $guestRegisterRequest->validated();
        $input['password'] = Hash::make($input['password']);
        $user = new User();
        $user->fullName = $input['fullName'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->role = 'guest';
        
        if($user->save()){
            Session::flash('success','Your account has been successfully created.');
            return redirect()->route('auth.login');
        }
        return redirect()->back()->withInput()->with('error', 'There was an error while saving');

    }
}
