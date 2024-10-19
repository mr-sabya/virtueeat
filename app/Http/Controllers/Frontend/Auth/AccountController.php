<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Helpers\GetLocation;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function account()
    {
        return view('frontend.user.account.index');
    }


    // change name form
    public function changeNameForm()
    {
        return view('frontend.user.account.name');
    }


    //update name
    public function updateName(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        return redirect()->route('user.account')->with('success', 'Your Name has been updated successfully');
    }


    public function changeAddress()
    {
        $get_location = new GetLocation();
        $data = $get_location->getLocation();
        
        $current_country = $data->country;
        $current_city = $data->city;
        // return $current_country;

        $country = Country::where('iso2', $current_country)->first();
        // return $country;
        $cities = City::where('country_id', $country->id)->get();

        $location = Location::where('id', Auth::user()->location_id)->first();
        $location_country = Country::where('iso2', $location->country)->first();

        $countries = Country::orderBy('name', 'ASC')->get();
        return view('frontend.user.account.address', compact('current_country', 'cities', 'current_city', 'location', 'location_country', 'countries'));

    }

    public function updateAddress(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->address = $request->address;
        $user->country_id = $request->country_id;
        $user->city_id = $request->city_id;

        $user->save();

        return redirect()->route('user.account')->with('success', 'Your Name has been updated successfully');
    }
}
