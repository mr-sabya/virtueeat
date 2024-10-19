@extends('merchant.layouts.app')
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

            @php 
            $user = App\Models\User::where('id', $order->user_id)->first();
            $country = App\Models\Country::where('iso2', $user->location['country'])->first();
            @endphp
            <div class="order-details">
                <h4 class="mb-3">Status: {{ $order->status['name'] }} </h4>

                @if($order->status['name'] == 'Pending')
                <a href="{{ route('merchant.order.confirmed', $order->id)}}" class="btn btn-primary">Confirm Order</a>
                @elseif($order->status['name'] == 'Confirmed')
                <p class="badge bg-success py-3 px-4"><i class="fa-solid fa-check"></i> Confirmed</p>
                @endif
                <hr>
                <h4>User: {{ $user->first_name }} {{ $user->last_name }}</h4>
                <hr>

                <table class="table">
                    <tr>
                        <td>Address</td>
                        <td>{{ $user->address }}</td>
                    </tr>
                    <tr>
                        <td>Phone : </td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <td>Location: </td>
                        <td>{{ $user->location['city'] }}, {{ $user->location['region'] }}, {{ $country->name }}    </td>
                    </tr>
                    
                </table>
            </div>
            <div class="food_item_right table-responsive d-block">
                <table class="table table-bordered data-table bg-white w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th style="text-align: right;">Price</th>
                            <th>Quantity</th>
                            <th>Instruction</th>
                            <th style="text-align: right;">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->menuItem['name'] }}</td>
                            <td style="text-align: right;">${{ $item->menuItem['price'] }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                
                            </td>
                            <td style="text-align: right;">${{ number_format((float)$item->menuItem['price'] * $item->quantity, 2, '.', '') }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="5" style="text-align: right;">Deliver Charge</th>
                            <th style="text-align: right;">${{ $order->delivery_charge == '' ? '0.00' : $order->delivery_charge }}</th>
                        </tr>
                        <tr>
                            <th colspan="5" style="text-align: right;">tax</th>
                            <th style="text-align: right;">${{ $order->tax }}</th>
                        </tr>
                        <tr>
                            <th colspan="5" style="text-align: right;">Total</th>
                            <th style="text-align: right;">${{ $order->total }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush