<?php

namespace App\Livewire\Frontend\Shop;

use App\Models\Cart;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $shop, $cart;
    public function mount($id)
    {
        $this->shop = Shop::findOrFail(intval($id));

        if (Auth::user()) {
            $this->cart = Cart::where('shop_id', $this->shop->id)->where('user_id', Auth::user()->id)->first();
        } else {
            $this->cart = Null;
        }
    }
    public function render()
    {
        return view('livewire.frontend.shop.index');
    }
}
