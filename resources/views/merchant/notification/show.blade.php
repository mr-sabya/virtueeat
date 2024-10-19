@extends('layouts.admin')
@section('content')
<div class="text_info_title_box style_2">
    <h1 class="sec_title">{{ $title }}</h1>
    <div class="info_right_side_box">
        <form class="food_search_form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-button">
                <button class="search_btn" type="submit" id="search-button"><i class="flaticon-loupe"></i></button>
            </div>
        </form>


    </div>
</div>
<div class="foods_menu_box">
    <div class="row">
        <div class="col-lg-12">
            <div class="food_item_right d-block">
                @php
                $user = App\Models\User::where('id', $notification->data['data']['user_id'])->first();
                $order = App\Models\Order::where('id', $notification->data['data']['order_id'])->first();
                @endphp
                <!-- {{ $notification->data['data']['order_id'] }} -->
                @if($notification->data['role'] == 'make_order')
                <h4>New Order by <a href="#">{{ $user->first_name == '' ? $user->email : $user->first_name.' '.$user->last_name }}</a> </h4>
                @endif
                <p>
                    @foreach($order->items as $item)
                    {{ $item->menuItem['name']}} ({{$item->quantity}})
                    {{ !$loop->last ? '+' : '' }}
                    @endforeach
                </p>
                <hr>
                <p>Sub Total: ${{ $order->sub_total }}</p>
                <hr>
                <p>Deliver Charge: ${{ $order->delivery_charge == '' ? '0.00' : $order->delivery_charge }}</p>
                <hr>
                <p>Tax: ${{ $order->tax }}</p>
                <hr>
                <p>Total: ${{ $order->total }}</p>
                <hr>
                <p>Location: {{ $user->location['city'] }}, {{ $user->location['region'] }}, {{ $user->location['country'] }}</p>
                <hr>
                <a href="{{ route('merchant.order.show', $order->id)}}">Go to Order</a>
                <div class="mb-4"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush