<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    function feed(Request $request)
    {
        // return $request;
        if ($request->location) {
            if(!Session::has('location')){
                $request->session()->put('location', $request->location);
            }
        }

        if (Session::has('location')) {
            $set_location = Session::get('location');
            $location_array = explode(', ', $set_location);
            $location = Location::where('city', $location_array[0])->first();
            if($location){
                return view('frontend.feed.index', compact('location'));
            }else{
                return back()->with('error', 'Sorry!!! No restaurant found in this location!!!');
            }
        } else {
            return back()->with('error', 'Sorry! No Restaurant Found!!');
        }
        // return view('frontend.feed.index');
    }
}
