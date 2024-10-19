<?php

namespace App\Http\Controllers\Merchant\Auth;

use App\Enums\UserType;
use App\Helpers\GetLocation;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\City;
use App\Models\Country;
use App\Models\ItemCategory;
use App\Models\Location;
use App\Models\Shop;
use App\Models\User;
use App\Notifications\NewUserNotification;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class RegisterController extends Controller
{
    public function showRegistrationForm(Request $request)
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




        return view('frontend.merchant.registration', compact('current_country', 'cities', 'current_city', 'location', 'location_country'));
    }


    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'post_code' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'shop_category_id' => 'required',
        ]);


        $shop = new Shop();
        $shop->company_name = $request->company_name;
        $shop->address = $request->address;
        $shop->country_id = $request->country_id;
        $shop->city_id = $request->city_id;
        $shop->post_code = $request->post_code;
        $shop->location_id = $request->location_id;
        $shop->shop_category_id = $request->shop_category_id;


        if ($shop->save()) {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phome;
            $user->password = Hash::make($request->password);
            $user->user_type = UserType::MERCHANT;
            $user->shop_id = $shop->id;
            $user->save();
        }

        $data = array(
            'user_id' => $user->id,
            'email' => $user->email,
            'user_type' => 'merchant',
        );

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new NewUserNotification($data));
        }


        // create default item category for each shop
        ItemCategory::craete([
            'name' => 'Featured items',
            'shop_id' => $shop->id,
        ]);
        ItemCategory::craete([
            'name' => 'Picked for you',
            'shop_id' => $shop->id,
        ]);

        auth()->login($user);

        return redirect()->route('merchant.dashboard');
    }
}
