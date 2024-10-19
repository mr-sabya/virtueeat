<?php

namespace App\Http\Controllers\Shop2;

use App\Http\Controllers\Controller;
use App\Models\Shop2Cart;
use App\Models\Shop2Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filter == 'default') {
            $products = Shop2Product::with('category')->orderBY('id', 'DESC')->paginate(2)->appends(request()->query());
        } elseif ($request->filter == 'low_to_high') {
            $products = Shop2Product::with('category')->orderBY('price', 'ASC')->paginate(2)->appends(request()->query());
        }elseif ($request->filter == 'high_to_low') {
            $products = Shop2Product::with('category')->orderBY('price', 'DESC')->paginate(2)->appends(request()->query());
        }else{
            $products = Shop2Product::with('category')->orderBY('id', 'DESC')->paginate(2)->appends(request()->query());
        }


        $total_products = Shop2Product::count();
        // return $products;
        $cart_items = Shop2Cart::where('user_id', Auth::user()->id)->get();

        $total = 0;
        foreach ($cart_items as $cart) {
            $sub_total = $cart->product['price'] * $cart->quantity;
            $total = $total + $sub_total;
        }

        $cart_total = number_format((float)$total, 2, '.', '');


        return view('frontend.shop2.home.index', compact('products', 'total_products', 'cart_items', 'cart_total'));
    }

    
}
