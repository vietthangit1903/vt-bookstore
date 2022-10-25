<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function ShowLoginForm()
    {
        if (Auth::check()) {
            return back();
        }
        return view('auth.login');
    }

    public function Login(LoginRequest $loginRequest)
    {
        $input = $loginRequest->validated();
        $isRemember = $input['remember'] ?? false;
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']], $isRemember)) {
            return redirect()->route('home')->with('success', 'Welcome! You have successfully signed in');
        }
        return redirect()->back()->withInput()->with('error', 'Your credentials have been incorrect');
    }

    public function Logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('info', 'Bye, see you again!');
    }
}
