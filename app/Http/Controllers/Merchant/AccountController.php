<?php

namespace App\Http\Controllers\Merchant;

use App\Helpers\GetLocation;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\EmployeeSize;
use App\Models\General;
use App\Models\Location;
use App\Models\Shop;
use App\Models\User;
use App\Utilities\FileUploadHelper;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //show account setting
    public function account()
    {
        $user = Auth::user();
        $account = Auth::user()->businessAccount;
        $employee_sizes = EmployeeSize::all();
        $countries = Country::all();
        $cities = City::where('country_id', $account->country_id)->get();
        return view('merchant.account.index', compact('user', 'account', 'employee_sizes', 'countries', 'cities'));
    }


    public function updateAccount(Request $request)
    {
        $account = Shop::findOrFail(intval($request->id));

        $account->update($request->all());

        $user = User::where('id', Auth::user()->id)->first();
        $user->update($request->all());

        return redirect()->route('merchant.account')->with('success', 'Account info has been updated');
    }

    public function restaurant()
    {
        $account = Auth::user()->businessAccount;
        $locations = Location::all();
        return view('merchant.account.restaurant', compact('account', 'locations'));
    }

    public function updateRestaurantInfo(Request $request)
    {
        // return $request;
        $id = $request->id;
        $account = Shop::findOrFail(intval($request->id));

        $data = $request->all();

        if (!empty($request->logo) && $request->logo instanceof UploadedFile) {
            $data['logo'] = $account->logo == '' ? FileUploadHelper::store($request->logo, 'logo'):FileUploadHelper::store($request->logo, 'logo', $account->logo);
        } 

        if (!empty($request->banner) && $request->banner instanceof UploadedFile) {
            $data['banner'] = $account->banner == '' ? FileUploadHelper::store($request->banner, 'banner'):FileUploadHelper::store($request->banner, 'banner', $account->banner);
        } 

        $account->update($data);

        return redirect()->route('merchant.restaurant')->with('success', 'Account info has been updated');
    }


    public function getMyLocation(Request $request, $id)
    {
        $location = new GetLocation();
        $data = $location->getLocation();
        //'city');
        // 'region', 'country', 'loc', 'postal', 'timezone'

        $location = new Location();
        $location->city = $data->city;
        $location->region = $data->region;
        $location->country = $data->country;
        $location->loc = $data->loc;
        $location->postal = $data->postal;
        $location->timezone = $data->timezone;

        $location->save();


        $account = Shop::findOrFail(intval($id));
        $account->location_id = $location->id;
        $account->save();

        return redirect()->route('merchant.restaurant');
    }
}
