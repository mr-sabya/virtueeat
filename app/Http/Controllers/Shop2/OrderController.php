<?php

namespace App\Http\Controllers\Shop2;

use App\Http\Controllers\Controller;
use App\Models\Shop2Cart;
use App\Models\Shop2Order;
use App\Models\Shop2OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart_items = Shop2Cart::where('user_id', Auth::user()->id)->get();
        if($cart_items->count()>0){

            return view('frontend.shop2.checkout.index');
        }else{
            return redirect()->route('shop.index');
        }
    }


    // store new order
    public function store(Request $request)
    {
        $input = $request->all();

        $cart_items = Shop2Cart::where('user_id', Auth::user()->id)->get();

        // calculate total cart

        $total = 0;
        foreach ($cart_items as $cart) {
            $sub_total = $cart->product['price'] * $cart->quantity;
            $total = $total + $sub_total;
        }

        $cart_total = number_format((float)$total, 2, '.', '');



        // store new order
        $input['user_id'] = Auth::user()->id;
        $input['total_price'] = $cart_total;
        $order = Shop2Order::create($input);


        // store order item
        foreach($cart_items as $item){
            $order_item = new Shop2OrderItem();
            $order_item->order_id = $order->id;
            $order_item->product_id = $item->product_id;
            $order_item->color_id = $item->color_id;
            $order_item->quantity = $item->quantity;
            $order_item->save();


            // delete cart items
            $item->delete();
        }

        return redirect()->route('shop.order.success');
    }


    public function successPage()
    {
        return view('frontend.shop2.order.success');
    }
}
