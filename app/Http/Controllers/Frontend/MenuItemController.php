<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\MenuItem;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuItemController extends Controller
{
    //show menu item
    public function show($shop, $id)
    {
        $menuItem = MenuItem::findOrFail(intval($id));
        $menuItems = MenuItem::where('shop_id', $menuItem->shop_id)->get()->except($menuItem->id);
        $shop = Shop::findOrFail(intval($shop));
        
        if (Auth::user()) {
            $cart = Cart::where('shop_id', $shop->id)->where('user_id', Auth::user()->id)->first();
        } else {
            $cart = Null;
        }
        return view('frontend.menuitem.show', compact('menuItem', 'menuItems', 'shop', 'cart'));
    }
}
