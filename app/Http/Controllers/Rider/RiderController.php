<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiderController extends Controller
{
    public function index() {
        return view('rider.dashboard');
    }
}
