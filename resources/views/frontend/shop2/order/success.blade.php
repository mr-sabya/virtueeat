@extends('layouts.merchant')

@section('body')
<section class="shop_product">
    <div class="container">
        <div class="shop_title_box">
            <h1>Order Success</h1>
        </div>
        <div class="order_sumary_box">
            <div class="order_sumary_inner" style="padding: 150px; text-align: center;">

                <h3>Thank you for your Order. We will processed your order soon. You will be notified from our team.</h3>
                <a href="{{ route('shop.index') }}" class="back_btn">Shop Again</a>
                
            </div>
        </div>
    </div>
</section>
@endsection