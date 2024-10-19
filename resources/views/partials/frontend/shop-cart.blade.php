<div class="cart_box dropdown">

    @auth
    @php
    $carts = App\Models\Cart::where('user_id', Auth::user()->id)->get();
    @endphp
    <div class="menu-box">
        <h6 class="cart_title">Cart . {{ $carts->count() }}</h6>
        <div class="cart_icon">
            <i class="icon-bag"></i>
        </div>
    </div>
    <div class="cart_box_outer">
        <div class="close_cart_btn"><img src="{{ url('assets/frontend/images/cross-btn.svg') }}" alt=""></div>
        <div class="cart_title_box">
            <h3 class="outer_title">Your Cart</h3>
            <div class="count_cart">({{ $carts->count() }})</div>
        </div>
        @if($carts->count() > 0)
        @foreach($carts as $cart)
        <a href="{{ route('main.cart.show')}}?shop={{$cart->shop['id']}}&&cart={{$cart->id}}">
            <div class="cart_product_item">
                <div class="info d-flex gap-3">
                    <div class="image">
                        <img src="{{ getFileUrl($cart->shop['logo']) }}" alt="" style="width: 60px; height: 60px; border-radius: 50%;">
                    </div>
                    <div class="product_info">
                        <h6 class="product_name">{{ $cart->shop['company_name']}}</h6>
                        <span class="rate">$15.99</span>
                    </div>
                </div>

                <i class="fa-solid fa-angle-right"></i>

            </div>
        </a>
        @endforeach
        @else
        <p>No Item In Cart</p>
        @endif
    </div>
    @else
    <div class="menu-box">
        <h6 class="cart_title">Cart . 0</h6>
        <div class="cart_icon">
            <i class="icon-bag"></i>
        </div>
    </div>
    <div class="cart_box_outer">
        <div class="close_cart_btn"><img src="{{ url('assets/frontend/images/cross-btn.svg') }}" alt=""></div>
        <div class="cart_title_box">
            <h3 class="outer_title">Your Cart</h3>
            <div class="count_cart">(0)</div>
        </div>
        <p>No Item In Cart</p>

    </div>
    @endauth
</div>