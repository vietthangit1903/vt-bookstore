<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
    public function Redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function Callback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $user = User::where('facebook_id', $facebookUser->id)->first();
            if ($user == null) {
                $newUser = new User();
                $newUser->fullName = $facebookUser->name;
                $newUser->email = $facebookUser->email;
                $newUser->facebook_id = $facebookUser->id;
                $newUser->role = 'guest';
                $newUser->save();
                Auth::login($newUser);
                return redirect()->intended();
            } else {
                Auth::login($user);
                return redirect()->intended();
            }
        } catch (\Throwable $th) {
            dd('Something went wrong');
        }
    }
}
