<?php

namespace App\Http\Controllers\Rider;

use App\Helpers\GetLocation;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Location;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $get_location = new GetLocation();
        $data = $get_location->getLocation($request);

        $current_country = $data->country;
        $current_city = $data->city;
        // return $current_country;

        $country = Country::where('iso2', $current_country)->first();
        // return $country;
        $cities = City::where('country_id', $country->id)->get();

        $location = Location::where('city', $data->city)
            ->where('loc', $data->loc)
            ->where('postal', $data->postal)
            ->first();

        if ($location) {
            $location_country = Country::where('iso2', $location->country)->first();
        } else {
            $location_country = '';
        }

        
        return view('rider.home.index', compact('current_country', 'country', 'location', 'location_country', 'cities', 'current_city'));
    }
}
