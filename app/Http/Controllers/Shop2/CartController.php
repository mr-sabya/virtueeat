<?php

namespace App\Http\Controllers\Shop2;

use App\Http\Controllers\Controller;
use App\Models\Shop2Cart;
use App\Models\Shop2Product;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cart_items = Shop2Cart::where('user_id', Auth::user()->id)->get();
        $total = 0;
        foreach ($cart_items as $cart) {
            $sub_total = $cart->product['price'] * $cart->quantity;
            $total = $total + $sub_total;
        }

        $cart_total = number_format((float)$total, 2, '.', '');
        return view('frontend.shop2.cart.index', compact('cart_items', 'cart_total'));
    }


    // add to cart
    public function addCart(Request $request, $id)
    {
        $product = Shop2Product::findOrFail(intval($id));

        $check_cart = Shop2Cart::where('product_id', $product->id)
            ->where('user_id', Auth::user()->id)->first();

        if ($request->page == 'product') {

            if($check_cart){
                return back()->with('message', 'This Item already in your cart');
            }else{
                $cart = new Shop2Cart();
                $cart->product_id = $product->id;
                $cart->user_id = Auth::user()->id;
                $cart->color_id = $request->color;
                $cart->quantity = $request->quantity;
                $cart->save();
            }
        } else {
            $product = Shop2Product::where('id', $id)->first();
            $color_code = $product->colors()->first();

            // return $color_code;

            if ($check_cart) {
                $check_cart->quantity = $check_cart->quantity + 1;
                $check_cart->save();
            } else {
                $cart = new Shop2Cart();
                $cart->product_id = $product->id;
                $cart->user_id = Auth::user()->id;
                $cart->color_id = $color_code->id;
                $cart->quantity = 1;
                $cart->save();
            }
        }





        return back();
    }



    public function updateCartItem($id, Request $request)
    {
        $cart_item = Shop2Cart::findOrFail(intval($id));

        if ($request->req == 'increment') {
            $cart_item->quantity = $cart_item->quantity + 1;
        } elseif ($request->req == 'decrement') {
            $cart_item->quantity = $cart_item->quantity - 1;
        }
        $cart_item->save();

        $total_price = number_format((float)$cart_item->product['price'] * $cart_item->quantity, 2, '.', '');

        // calculate total
        $cart_items = Shop2Cart::where('user_id', Auth::user()->id)->get();

        $total = 0;
        foreach ($cart_items as $cart) {
            $sub_total = $cart->product['price'] * $cart->quantity;
            $total = $total + $sub_total;
        }
        $cart_total = number_format((float)$total, 2, '.', '');

        return Response()->json([
            'success' => 'cart has been updated',
            'total_price' => $total_price,
            'cart_item' => $cart_item,
            'cart_total' => $cart_total,
        ]);
    }



    // delete cart
    public function deleteCartItem($id)
    {
        $cart_item = Shop2Cart::findOrFail(intval($id));
        $cart_item->delete();
        
        return back()->with('success', 'Cart Item has been deleted successfully');
    }
}
