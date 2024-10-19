<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FavoriteItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelpController extends Controller
{
    // show help page
    public function index()
    {
        return view('frontend.help.index');    
    }
}
