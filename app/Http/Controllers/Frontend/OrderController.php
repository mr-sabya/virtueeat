<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shop;
use App\Models\User;
use App\Notifications\MakeOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // show all order list
    public function index()
    {
        $orders = Order::with('items')->where('user_id', Auth::user()->id)->get();
        return view('frontend.user.orders.index', compact('orders'));
    }

    // order show
    public function show($id)
    {
        $order = Order::findOrFail(intval($id));
        // return $order->items;
        return view('frontend.user.orders.show', compact('order'));
    }

    public function order(Request $request)
    {
        $cart = Cart::where('id', $request->cart_id)->firstOrFail();
        $cart_items = CartItem::where('cart_id', $cart->id)->get();

        $order = Order::create($request->all());

        foreach($cart_items as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'menu_item_id' => $item->menu_item_id,
                'sub_menu_item_id' => $item->sub_menu_item_id,
                'quantity' => $item->quantity,
            ]);
        }


        // delete cart
        foreach($cart_items as $cart_item){
            $cart_item->delete();
        }

        $cart->delete();


        // send notification

        $data = array(
			'user_id' => $order->user_id,
			'shop_id' => $order->shop_id,
			'order_id' => $order->id,
		);

        $shop = Shop::where('id', $order->shop_id)->first();

        $riders = User::where('user_type', UserType::RIDER)->where('location_id', $shop->location_id)->get();

        // return $shop;
		foreach ($riders as $rider) {
			$rider->notify(new MakeOrderNotification($data));
		}

        $admins = Admin::all();
        foreach($admins as $admin){
            $admin->notify(new MakeOrderNotification($data));
        }

        $merchant = User::where('shop_id', $shop->id)->first();
        $merchant->notify(new MakeOrderNotification($data));

        return redirect()->route('user.order.show', $order->id);
    }
}
