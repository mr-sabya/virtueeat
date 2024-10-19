<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function showResetForm()
    {
        return view('frontend.auth.password.reset');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' =>  'required|min:8|confirmed'
        ]);


        $user = User::where('id', Auth::user()->id)->first();

        $user->password = Hash::make($request->password);
        $user->save();

        Auth::logout();

        return redirect()->route('home')->with('success', 'Your Password has been updated ');
    }
}
