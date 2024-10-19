@extends('layouts.merchant')

@section('body')
<section class="shop_product">
    <div class="container">
        <div class="shop_title_box">
            <h1>Your Cart</h1>
        </div>
        @if($cart_items->count() > 0)
        @foreach($cart_items as $item)
        <div class="cart_product_item">
            <div class="produt_image"><img src="{{ getFileUrl($item->product['image'])}}" alt=""></div>
            <div class="product_info">
                <div class="product_title_box">
                    <h3 class="product_name">{{ $item->product['name']}}</h3>
                    <div class="product_price">${{ $item->product['price']}} <span>${{ $item->product['regular_price']}}</span></div>
                </div>
                <div class="product_info_box">
                    <p class="product_description">{{ $item->product['description']}}</p>
                    <div class="delete_btn"><a href="{{ route('shop.cart.delete', $item->id) }}"><i class="flaticon-trash-can"></i></a></div>
                </div>
                <div class="product-quantity">
                    <a href="javascript:void(0)" class="plus cart-btn show-page plus-btn" data-id="{{ $item->id }}"><i class="fa-solid fa-plus"></i></a>
                    <a href="javascript:void(0)" class="minus cart-btn show-page minus-btn" data-id="{{ $item->id }}"><i class="fa-solid fa-minus"></i></a>
                    <input class="quantity-spinner" id="quantity_{{ $item->id }}" type="text" value="{{ $item->quantity}}" name="quantity" readonly>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="card mb-5" style="border-radius: 40px;">
            <div class="card-body text-center p-5">
                <h3>No Items in Cart</h3>
                <a href="{{ route('shop.index') }}" class="back_btn">Go to Shop</a>
            </div>
        </div>
        @endif

        <div class="order_sumary_box">
            <div class="order_sumary_inner">
                <div class="order_title_box">
                    <div class="order_samary_title">Order Summary ({{$cart_items->count()}} Items)</div>
                    <div class="order_details">details</div>
                </div>

                <div class="order_item">
                    <div class="order_item_name">Merchandise Subtotal</div>
                    <div class="order_price">$ <span id="total">{{$cart_total}}</span></div>
                </div>
                <div class="order_item">
                    <div class="order_item_name">Tax, Shipping & Delivery</div>
                    <div class="order_price">See In Checkout</div>
                </div>
                <div class="order_item">
                    <div class="order_item_name"><strong>Estimated Total</strong></div>
                    <div class="order_price total_amount">$ <span id="total">{{$cart_total}}</span></div>
                </div>
                <a class="btn-form" href="{{ route('shop.checkout.index')}}" type="submit">Go to Checkout</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $(document).on('click', '.plus', function() {
        let id = $(this).attr('data-id');
        let input = $('#quantity_' + id);

        $.ajax({
            type: "GET",
            url: "/shop/cart-item/update/" + id + "?req=increment",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                input.val(response.cart_item.quantity);
                // $('#product_rate_' + id).html(response.total_price)
                $('#total').html(response.cart_total)
            }
        });
    });
    $(document).on('click', '.minus', function() {
        let id = $(this).attr('data-id');
        let input = $('#quantity_' + id);

        $.ajax({
            type: "GET",
            url: "/shop/cart-item/update/" + id + "?req=decrement",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                input.val(response.cart_item.quantity);
                // $('#product_rate_' + id).html(response.total_price)
                $('#total').html(response.cart_total)
            }
        });
    });
</script>
@endsection