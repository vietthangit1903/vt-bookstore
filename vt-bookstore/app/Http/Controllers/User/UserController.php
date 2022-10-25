<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUserAccount(){
        $user = User::find(Auth::id());
        $user_addresses = Address::where('user_id', $user->id)->get();
        // dd($user_addresses);
        $data = [
            'user' => $user,
            'user_addresses' => $user_addresses,
        ];
        return view('user.my-account', $data);
    }
}
