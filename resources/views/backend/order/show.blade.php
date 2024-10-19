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

            @php
            $user = App\Models\User::where('id', $order->user_id)->first();
            $country = App\Models\Country::where('iso2', $user->location['country'])->first();
            $shop = App\Models\Shop::where('id', $order->shop_id)->first();
            @endphp
            <div class="order-details">
                <h4 class="mb-3">Status: {{ $order->status['name'] }} </h4>
                <h5>Rider:
                    @if($order->rider_id == NULL)
                    No Rider take this order!!
                    @else
                    <a href="{{ route('admin.rider.show', $order->rider['id'])}}">{{ $order->rider['first_name'] }} {{ $order->rider['last_name'] }}</a>
                    @endif
                </h5>


                <hr>

                <div class="row">
                    <div class="col-lg-6">
                        <table class="table">
                            <tr>
                                <td>User: </td>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            </tr>
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
                                <td>{{ $user->location['city'] }}, {{ $user->location['region'] }}, {{ $country->name }} </td>
                            </tr>

                        </table>
                    </div>

                    <div class="col-lg-6">
                        <table class="table">
                            <tr>
                                <td>Shop:</td>
                                <td>{{ $shop->company_name }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $shop->address }}</td>
                            </tr>
                            <tr>
                                <td>Phone : </td>
                                <td>{{ $shop->phone }}</td>
                            </tr>
                            <tr>
                                <td>Location: </td>
                                <td>{{ $shop->location['city'] }}, {{ $shop->location['region'] }}, {{ $shop->country }} </td>
                            </tr>

                        </table>
                    </div>
                </div>
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