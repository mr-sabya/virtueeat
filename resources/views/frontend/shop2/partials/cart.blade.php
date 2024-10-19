<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
    <div class="shop_sidebar">
        <div class="cart_box">
            @if($cart_items->count() > 0)
            @foreach($cart_items as $item)
            <div class="shoping_cart_item">
                <div class="product_name">{{ $item->product['name']}}</div>
                @php
                $sub_total = $item->product['price'] * $item->quantity;
                $show_sub_total = number_format((float)$sub_total, 2, '.', '');
                @endphp
                <div class="product_rate">$<span id="product_rate_{{ $item->id }}">{{ $show_sub_total }}</span></div>

                <div class="delete_btn"><a href="{{ route('shop.cart.delete', $item->id) }}"><i class="flaticon-trash-can"></i></a></div>
                <div class="product-quantity">
                    <a href="javascript:void(0)" class="plus cart-btn plus-btn" data-id="{{ $item->id }}"><i class="fa-solid fa-plus"></i></a>
                    <a href="javascript:void(0)" class="minus cart-btn minus-btn" data-id="{{ $item->id }}"><i class="fa-solid fa-minus"></i></a>
                    <input class="quantity-spinner" id="quantity_{{ $item->id }}" type="text" value="{{ $item->quantity}}" name="quantity" readonly>
                </div>
            </div>
            @endforeach
            @else
            <div class="card mb-5" style="border-radius: 40px;">
                <div class="card-body text-center p-5">
                    <h4>No Items in Cart</h4>
                </div>
            </div>
            @endif

            <div class="sub_total_box">
                <div class="sub_total_title">
                    <h6>Subtotal</h6>
                    <p>Shipping, taxes, and discounts will <br>be calculated at checkout.</p>
                </div>
                <div class="sub_total_rate">
                    <h5>$<span id="total">{{ $cart_total }}</span></h5>
                </div>
            </div>
            <div class="checkout_btn"><button type="button">Go to Checkout <i class="flaticon-credit-card"></i></button></div>
        </div>
    </div>
</div>