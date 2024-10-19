<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }


    // login

    public function login(LoginRequest $request)
    {
        $request->authenticateAdmin();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::ADMINHOME);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
}
