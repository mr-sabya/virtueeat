<?php

namespace App\Http\Controllers;

use App\Helpers\GetLocation;
use App\Models\Country;
use App\Models\Location;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    public function getUserInfo(Request $request)
    {
        $get_location = new GetLocation();
        $data = $get_location->getLocation($request);


        $check_location = Location::where('city', $data->city)
            ->where('loc', $data->loc)
            ->where('postal', $data->postal)
            ->first();

        if ($check_location) {
            $location = Location::where('city', $data->city)
                ->where('loc', $data->loc)
                ->where('postal', $data->postal)
                ->first();
        } else {
            $location = new Location();
            $location->city = $data->city;
            $location->region = $data->region;
            $location->country = $data->country;
            $location->loc = $data->loc;
            $location->postal = $data->postal;
            $location->timezone = $data->timezone;

            $location->save();
        }



        // return $current_country;

        $country = Country::where('iso2', $location->country)->first();

        return response()->json([
            'location' => $location,
            'country' => $country
        ]);
    }

    public function searchLocation(Request $request)
    {
        $query = $request->input('query');

        // Call the Nominatim API for location suggestions
        $response = Http::get('https://nominatim.openstreetmap.org/search', [
            'q' => $query,
            'format' => 'json',
            'addressdetails' => 1,
            'limit' => 5, // Limit results for suggestions
        ]);

        return $response;

        // Check if the response is successful
        if ($response->successful()) {
            $data = $response->json();

            // Extract only relevant data for suggestions
            $suggestions = [];
            foreach ($data as $result) {
                $suggestions[] = [
                    'formatted_address' => $result['display_name'],
                    'latitude' => $result['lat'],
                    'longitude' => $result['lon'],
                ];
            }

            return response()->json($suggestions);
        } else {
            return response()->json(['error' => 'Unable to fetch location data.'], 500);
        }
    }
}
