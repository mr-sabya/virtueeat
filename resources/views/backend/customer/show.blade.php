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


            <div class="order-details">



                <h4>User: 
                @if($user->first_name == NULL)
                {{$user->email }}
                @else    
                {{ $user->first_name }} {{ $user->last_name }}</h4>
                @endif


                <p class="mb-3 mt-3">Status: @if($user->is_active == 1) <span class="text-success">Approved</span>@else<span class="text-danger">Not Approved</span>@endif</p>
                @if($user->is_active == 0)
                <a href="{{ route('admin.user.approve', $user->id)}}" class="btn btn-primary">Approve</a>
                @endif
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
                        @if($user->location_id != NULL)
                        <td>{{ $user->location['city'] }}, {{ $user->location['region'] }}, {{ $country->name }} </td>
                        @else
                        <td></td>
                        @endif
                    </tr>

                </table>
            </div>
            <div class="row mb-4">
                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Total Earning</p>
                            <h4>$ 0</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Wallet Balance</p>
                            <h4>$ 0</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Withdraw</p>
                            <h4>$ 0</h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Total Order</p>
                            <h4>{{ $user->orders->count()}}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Pending Order</p>
                            <h4>0</h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Total Reference</p>
                            <h4>0</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="food_item_right table-responsive d-block">
                <h4>Orders</h4>
                <hr>
                @if($user->orders->count()>0)
                @foreach($user->orders as $order)
                <div class="card mb-3">
                    <div class="card-body">

                        <div>
                            @php
                            $shop = App\Models\Shop::where('id', $order->shop_id)->first();
                            @endphp
                            <p style="font-weight: bold;" class="border-bottom mb-3"><a href="{{ route('admin.main.order.show', $order->id)}}">Order. {{ $loop->index + 1 }} - {{ date('d-m-Y', strtotime($order->created_at)) }} - {{ $order->status['name']}} </a></p>

                            <table class="table table-bordered">
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
                @endforeach
                @else
                <div class="mb-3">
                    <p>No order Yet!</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush