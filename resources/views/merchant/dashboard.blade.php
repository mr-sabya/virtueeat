@extends('merchant.layouts.app')

@section('content')
<div class="work_shift_outer_box style_2">
    <div class="analytics_outer_box">
        <div class="analytics_block">
            <h1 class="">541</h1>
            <h6 class="">Pending Orders</h6>
        </div>
        <div class="analytics_block">
            <h1 class="">203</h1>
            <h6 class="">Active Orders</h6>
        </div>
        <div class="analytics_block">
            <h1 class="">158</h1>
            <h6 class="">Delivered Orders</h6>
        </div>
        <div class="analytics_block">
            <h1 class="">56</h1>
            <h6 class="">Customer Cancelled Orders</h6>
        </div>
        <div class="analytics_block">
            <h1 class="">78</h1>
            <h6 class="">Restaurants</h6>
        </div>
        <div class="analytics_block">
            <h1 class="">40</h1>
            <h6 class="">Categories</h6>
        </div>
        <div class="analytics_block">
            <h1 class="">563</h1>
            <h6 class="">Food Items</h6>
        </div>
        <div class="analytics_block">
            <h1 class="">24</h1>
            <h6 class="">Promotions</h6>
        </div>
    </div>

    <form class="filter_search_box" action="action_page.php">
        <label for="search"><i class="flaticon-calendar"></i></label>
        <input type="text" name="search" placeholder="Filter By Date">
        <button type="submit"><i class="flaticon-loupe"></i></button>
    </form>

    <div class="chart_outer_box mb_40">
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="chart-container">
                    <canvas id="lineChart1"></canvas>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="chart-container">
                    <canvas id="lineChart2"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="nav nav-tabs">
        <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1">Pending</a>
        <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2">Active</a>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab1">
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="order_box_item">
                        <div class="order_upper_box">
                            <div class="order_header_title">
                                <div class="order_id_number">ORDER ID - 845</div>
                                <div class="order_date">ORDER DATE <span>- May 11,2023 . 06:30 pm</span></div>
                            </div>
                            <div class="product_image_box">
                                <div class="product">
                                    <img src="{{ url('assets/backend/images/foods/foods_13.png') }}" alt="">
                                    <img src="{{ url('assets/backend/images/foods/foods_14.png') }}" alt="">
                                </div>
                                <div class="title">Tocipapas X6</div>
                                <div class="link_btn"><a href="#">more</a></div>
                            </div>
                            <div class="product_review_box">
                                <div class="user">
                                    <img src="images/resource/user_review.png" alt="">
                                </div>
                                <div class="title">Customer Ordered X5</div>
                                <div class="link_btn"><a href="#">note</a></div>
                            </div>
                            <div class="payment_tag">Payment - online (stripe)</div>
                        </div>
                        <div class="order_lower_box">
                            <div class="left_side">
                                <div class="order_amount">Order Price - $250.00</div>
                                <div class="user_contact">Contact User - 1251546211145</div>
                            </div>
                            <div class="right_side">
                                <div class="order_reject"><a href="#">Reject</a></div>
                                <div class="order_confirm"><a href="#" class="active">confirm</a></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-pane fade" id="tab2">
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="order_box_item">
                        <div class="order_upper_box">
                            <div class="order_header_title">
                                <div class="order_id_number">ORDER ID - 845</div>
                                <div class="order_date">ORDER DATE <span>- May 11,2023 . 06:30 pm</span></div>
                            </div>
                            <div class="product_image_box">
                                <div class="product">
                                    <img src="{{ url('assets/backend/images/foods/foods_13.png') }}" alt="">
                                    <img src="{{ url('assets/backend/images/foods/foods_14.png') }}" alt="">
                                </div>
                                <div class="title">Tocipapas X6</div>
                                <div class="link_btn"><a href="#">more</a></div>
                            </div>
                            <div class="product_review_box">
                                <div class="user">
                                    <img src="images/resource/user_review.png" alt="">
                                </div>
                                <div class="title">Customer Ordered X5</div>
                                <div class="link_btn"><a href="#">note</a></div>
                            </div>
                            <div class="payment_tag">Payment - online (stripe)</div>
                        </div>
                        <div class="order_lower_box">
                            <div class="left_side">
                                <div class="order_amount">Order Price - $250.00</div>
                                <div class="user_contact">Contact User - 1251546211145</div>
                            </div>
                            <div class="right_side">
                                <div class="order_reject"><a href="#">Reject</a></div>
                                <div class="order_confirm"><a href="#" class="active">confirm</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/backend/js/chart-script.js') }}"></script>
@endpush
