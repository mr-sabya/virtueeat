<?php

namespace App\Http\Controllers\Shop2;

use App\Http\Controllers\Controller;
use App\Models\Shop2Cart;
use App\Models\Shop2Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Shop2Product::where('slug', $slug)->firstOrFail();
        $products = Shop2Product::with('category')->orderBY('id', 'DESC')->take(6)->get();
        $total_products = Shop2Product::count();
        $cart_items = Shop2Cart::where('user_id', Auth::user()->id)->get();
        return view('frontend.shop2.product.show', compact('product', 'total_products', 'products', 'cart_items'));
    }


    public function search(Request $request)
    {
        // $products = Shop2Product::where('name', 'LIKE', '%' . $request->search . '%')->get();

        if ($request->filter == 'default') {
            $products = Shop2Product::with('category')->where('name', 'LIKE', '%' . $request->search . '%')->orderBY('id', 'DESC')->paginate(1)->appends(request()->query());
        } elseif ($request->filter == 'low_to_high') {
            $products = Shop2Product::with('category')->where('name', 'LIKE', '%' . $request->search . '%')->orderBY('price', 'ASC')->paginate(1)->appends(request()->query());
        } elseif ($request->filter == 'high_to_low') {
            $products = Shop2Product::with('category')->where('name', 'LIKE', '%' . $request->search . '%')->orderBY('price', 'DESC')->paginate(1)->appends(request()->query());
        } else {
            $products = Shop2Product::with('category')->where('name', 'LIKE', '%' . $request->search . '%')->orderBY('id', 'DESC')->paginate(1)->appends(request()->query());
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

        return view('frontend.shop2.product.search', compact('products', 'total_products', 'cart_items', 'cart_total'));
    }
}
