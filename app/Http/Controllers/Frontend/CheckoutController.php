<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Location;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //go to shop check out
    public function index(Request $request)
    {
        if($request->cart){
            $cart = Cart::where('id', $request->cart)->first();
            $shop = Shop::where('id', $cart->shop_id)->first();

            $get_total = 0;
            foreach($cart->items as $item){
                $sub_total = $item->quantity * $item->menuItem['price'];
                $get_total = $get_total + $sub_total;
            }

            $total = number_format((float)$get_total, 2, '.', '');

            // location
            $location = Auth::user()->location;
            $country = Country::where('iso2', $location->country)->first();
            return view('frontend.checkout.index', compact('cart', 'shop', 'total', 'location', 'country')); 
        }
        return view('frontend.checkout.index'); 
    }
}
