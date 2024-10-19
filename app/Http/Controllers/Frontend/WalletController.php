<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    //show user wallet
    public function index()
    {
        return view('frontend.user.wallet.index');
    }
}
