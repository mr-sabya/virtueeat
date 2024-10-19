<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Psy\sh;

class CartController extends Controller
{
    //add to cart
    public function addCart(Request $request, $id)
    {
        $shop = Shop::where('id', $id)->firstOrFail();
        $check_cart = Cart::where('shop_id', $shop->id)->where('user_id', Auth::user()->id)->first();

        if ($check_cart) {
            $cart_item = new CartItem();
            $cart_item->cart_id = $check_cart->id;
            $cart_item->menu_item_id = $request->menu_item_id;
            $cart_item->sub_menu_item_id = $request->sub_menu_item_id;
            $cart_item->quantity = $request->quantity;
            $cart_item->instruction = $request->instruction;
            $cart_item->save();
        } else {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->shop_id = $shop->id;
            $cart->save();

            $cart_item = new CartItem();
            $cart_item->cart_id = $cart->id;
            $cart_item->menu_item_id = $request->menu_item_id;
            $cart_item->sub_menu_item_id = $request->sub_menu_item_id;
            $cart_item->quantity = $request->quantity;
            $cart_item->instruction = $request->instruction;
            $cart_item->save();
        }

        return back()->with('success', 'Cart Item has been added');
    }

    // show cart items
    public function show(Request $request)
    {
        if ($request->cart) {
            $id = $request->cart;
            $cart = Cart::findOrFail(intval($id));
            return view('frontend.cart.index', compact('cart'));
        }else{
            return back();
        }
    }



    public function updateCartItem($cart, $id, Request $request)
    {
        $cart_item = CartItem::findOrFail(intval($id));

        if ($request->req == 'increment') {
            $cart_item->quantity = $cart_item->quantity + 1;
        } elseif ($request->req == 'decrement') {
            $cart_item->quantity = $cart_item->quantity - 1;
        }
        $cart_item->save();

        $total_price = number_format((float)$cart_item->menuItem['price'] * $cart_item->quantity, 2, '.', '');

        // calculate total
        $cart_items = CartItem::where('cart_id', $cart)->get();

        $total = 0;
        foreach ($cart_items as $cart) {
            $sub_total = $cart->menuItem['price'] * $cart->quantity;
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
}
