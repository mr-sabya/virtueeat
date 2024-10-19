<?php

namespace App\Http\Controllers\Rider\Auth;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => UserType::RIDER])) {
            // Authentication was successful...
            return redirect()->route('rider.dashboard');
        }else{
            return back();
        }
    }
}
