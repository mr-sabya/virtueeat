<div class="cart_box dropdown">

    @php
    $cart_items = App\Models\CartItem::where('cart_id', $cart->id)->get();
    $get_total = 0;
    @endphp

    @if(isset($shop))
    <div class="menu-box">
        <h6 class="cart_title">Cart . {{ $cart_items->count() }}</h6>
        <div class="cart_icon">
            <i class="icon-bag"></i>
        </div>
    </div>
    @endif
    <div class="cart_box_outer">
        @if(isset($shop))
        <div class="close_cart_btn" style="display: inline-block;"><img src="{{ url('assets/frontend/images/cross-btn.svg') }}" alt=""></div>
        @endif
        <div class="cart_title_box">
            <h3 class="outer_title">Cart from <br><a href="{{ route('main.shop.show', $cart->shop['id'])}}?category={{ $cart->shop['category']['slug'] }}">{{ $cart->shop['company_name']}}</a></h3>
            <div class="count_cart">({{ $cart_items->count() }})</div>
        </div>

        @foreach($cart_items as $cart_item)
        <div class="cart_product_item">
            <div class="product_info">
                <h6 class="product_name">{{ $cart_item->menuItem['name']}}</h6>
                <span class="rate">${{ $cart_item->menuItem['price']}}</span>
            </div>
            <div class="item-quantity">
                <a href="javascript:void(0)" class="quantity plus" data-id="{{ $cart_item->id }}"><i class="fa-solid fa-plus"></i></a>
                <a href="javascript:void(0)" class="quantity minus" data-id="{{ $cart_item->id }}"><i class="fa-solid fa-minus"></i></a>
                <input class="quantity-spinner" id="quantity_{{ $cart_item->id }}" type="text" value="{{ $cart_item->quantity }}" name="quantity" readonly>
            </div>
        </div>
        @php
        $get_sub_total = $cart_item->menuItem['price'] * $cart_item->quantity;
        $get_total = $get_total + $get_sub_total;
        $total = number_format((float)$get_total, 2, '.', '');
        @endphp
        <!-- calculate total -->
        @endforeach

        <div class="go_to_checkout">
            <a href="{{ route('main.checkout.index')}}?cart={{ $cart->id }}" class="theme-btn-two">Go to checkout •
                $<span id="total">{{ isset($total) ? $total : '' }}</span></a>

            @if(!isset($shop))
            <a href="{{ route('main.shop.show', $cart->shop['id'])}}?category={{ $cart->shop['category']['slug'] }}" class="theme-btn-two"><i class="fa-solid fa-plus"></i> Add Item</a>
            @endif
        </div>
    </div>
</div>