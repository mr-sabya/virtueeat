<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeControlelr extends Controller
{
    public function index()
    {
        if(Session::has('home_url')){
            return redirect(Session::get('home_url'));
        }else{
            return view('frontend.home.index');
        }
    }
}
