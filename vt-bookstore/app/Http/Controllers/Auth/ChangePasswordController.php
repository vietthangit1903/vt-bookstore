<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword(ChangePasswordRequest $request)
    {
        $input = $request->validated();
        if (Hash::check($input['currentPassword'], Auth::user()->password)) {
            if (strcmp($input['currentPassword'], $input['newPassword']) != 0) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($input['newPassword']);
                if($user->save())
                    return redirect()->back()->with('success', 'Your password has been updated successfully');
                return redirect()->back()->with('error', 'There was an error while updating your password');
                
            }
            return redirect()->back()->with('error', 'New password and old password must different');
        }
        return redirect()->back()->with('error', 'Your credentials are incorrect');
    }
}
