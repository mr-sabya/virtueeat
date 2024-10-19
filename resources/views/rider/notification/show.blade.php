@extends('layouts.admin')
@section('content')
<div class="text_info_title_box style_2 mb-5">
    <h1 class="sec_title">{{ $title }}</h1>
    <div class="info_right_side_box">
        


    </div>
</div>
<div class="foods_menu_box">
    <div class="row">
        <div class="col-lg-12">
            <div class="food_item_right d-block">
                @php
                $user = App\Models\User::where('id', $notification->data['data']['user_id'])->first();
                $order = App\Models\Order::where('id', $notification->data['data']['order_id'])->first();
                $shop = App\Models\Shop::where('id', $notification->data['data']['shop_id'])->first();
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
                
                <p>User Location: {{$user->address}}, {{ $user->location['city'] }}, {{ $user->location['region'] }}, {{ $user->location['country'] }}</p>
                <hr>
                <h4>Shop : {{ $shop->company_name }}</h4>
                <p>User Location: {{$shop->address}}, {{ $shop->location['city'] }}, {{ $shop->location['region'] }}, {{ $shop->location['country'] }}</p>
                <hr>
                <a href="{{ route('rider.order.show', $order->id)}}" class="pb-3">Go to Order</a>
                <div class="mb-4"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush