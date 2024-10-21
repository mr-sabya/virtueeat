@extends('backend.layouts.app')

@section('title', 'Order')

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

            <div class="order-details">
                <h4>Status: {{ $order->status }} <a href="{{ route('admin.order.edit', $order->id) }}" class="edit btn_box"> <i class="fa-solid fa-pen"></i> Edit </a></h4>
                <hr>
                <h4>User: {{ $order->user['name'] }}</h4>
                <hr>

                <table class="table">
                    <tr>
                        <td>First Name : {{ $order->first_name }}</td>
                        <td>Last Name : {{ $order->last_name }}</td>
                    </tr>
                    <tr>
                        <td>Phone : {{ $order->phone }}</td>
                        <td>Email : {{ $order->email }}</td>
                    </tr>
                    <tr>
                        <td>Address 1 : {{ $order->address_line_1 }}</td>
                        <td>Address 2 : {{ $order->address_line_2 }}</td>
                    </tr>
                    <tr>
                        <td>City : {{ $order->city }}</td>
                        <td>Zip Code : {{ $order->zip_code }}</td>
                    </tr>
                    <tr>
                        <td>Card Holder Name : {{ $order->card_holder_name }}</td>
                        <td>Exprire Month : {{ $order->card_month }}</td>
                    </tr>
                    <tr>
                        <td>Expire year : {{ $order->card_year }}</td>
                        <td>CVV : {{ $order->cvv }}</td>
                    </tr>
                </table>
            </div>
            <div class="food_item_right table-responsive d-block">
                <table class="table table-bordered data-table bg-white w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Color</th>
                            <th>Total_price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->product['name'] }}</td>
                            <td>{{ $item->product['price'] }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                @if($item->color)
                                {{ $item->color['name'] }}
                                @endif
                            </td>
                            <td>{{ $item->product['price'] * $item->quantity }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="5" style="text-align: right;">Total</th>
                            <th class="text-right">{{ $order->total_price }}</th>
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