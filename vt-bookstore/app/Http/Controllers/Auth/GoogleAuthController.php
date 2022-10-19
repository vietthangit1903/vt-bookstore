<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function Redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function Callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('google_id', $googleUser->id)->first();
            if ($user == null) {
                $newUser = new User();
                $newUser->fullName = $googleUser->name;
                $newUser->email = $googleUser->email;
                $newUser->google_id = $googleUser->id;
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
