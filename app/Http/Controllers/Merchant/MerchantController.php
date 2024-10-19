<?php

namespace App\Http\Controllers\Merchant;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type === UserType::MERCHANT) {
            return view('merchant.dashboard');
        } else {
            return redirect()->route('404');
        }
    }
}
