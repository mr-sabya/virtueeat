<x-app-layout>

    <!--Login Popup-->
    <div id="open_popup_box" class="open_popup_box">
        <div class="popup_inner">
            <div class="popup_close_btn"><img src="{{ url('assets/frontend/images/cross-btn.svg') }}" alt=""></div>
            <div class="popup_overlay_layer"></div>
            <div class="restaurant_location_box">
                <h2 class="restaurant_name">Deliver to</h2>
                <form action="#">
                    <div class="form-group">
                        <input type="text" id="locationInput" placeholder="New York">
                        <i class="icon-map-pin" id="searchIcon"></i>
                        <div id="suggestionsContainer"></div>
                    </div>
                    <div class="form-group mt_100">
                        <button type="submit" class="theme-btn-two">Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End Login Popup-->

    <!--Login Popup-->
    <div id="open_popup_box2" class="open_popup_box select_schedule_time_date">
        <div class="popup_inner">
            <div class="popup_close_btn"><img src="assets/images/cross-btn.svg" alt=""></div>
            <div class="popup_overlay_layer"></div>
            <div class="restaurant_location_box">
                <h2 class="restaurant_name">Schedule delivery</h2>
                <div class="select_schedule_time_box">
                    <div class="select_date">
                        <div id="selectorButtons" class="owl-carousel owl-theme thm-owl__carousel" data-owl-options='{
                                "loop": true,
                                "autoplay": true,
                                "margin": 10,
                                "nav": true,
                                "dots": false,
                                "smartSpeed": 500,
                                "autoplayTimeout": 10000,
                                "navText": ["<i class=\"icon-arrow-left\"></i>","<i class=\"icon-arrow-right\"></i>"],
                                "responsive": {
                                        "0": {
                                            "items": 1
                                        },
                                        "768": {
                                            "items": 2
                                        },
                                        "992": {
                                            "items": 3
                                        },
                                        "1200": {
                                            "items": 4
                                        }
                                    }
                            }'>
                            <div class="selector-button active" onclick="selectOption('Today')">
                                <h6 class="date">Today</h6>
                                <span>Dec 21</span>
                            </div>
                            <div class="selector-button" onclick="selectOption('Tomorrow')">
                                <h6 class="date">Tomorrow</h6>
                                <span>Dec 22</span>
                            </div>
                            <div class="selector-button" onclick="selectOption('Sat')">
                                <h6 class="date">Sat</h6>
                                <span>Dec 23</span>
                            </div>
                            <div class="selector-button" onclick="selectOption('Sun')">
                                <h6 class="date">Sun</h6>
                                <span>Dec 24</span>
                            </div>
                            <div class="selector-button" onclick="selectOption('Mon')">
                                <h6 class="date">Mon</h6>
                                <span>Dec 25</span>
                            </div>
                            <div class="selector-button" onclick="selectOption('Tue')">
                                <h6 class="date">Tue</h6>
                                <span>Dec 26</span>
                            </div>
                            <div class="selector-button" onclick="selectOption('Wed')">
                                <h6 class="date">Wed</h6>
                                <span>Dec 27</span>
                            </div>
                        </div>
                    </div>
                    <div class="select_schedule_time">
                        <div class="custom-controls-stacked">
                            <label class="custom-control material-checkbox">
                                <input type="checkbox" id="checkbox1" class="material-control-input">
                                <span class="material-control-indicator"></span>
                                <span class="description">5:45 PM - 6:15 PM</span>
                            </label>
                        </div>
                        <div class="custom-controls-stacked">
                            <label class="custom-control material-checkbox">
                                <input type="checkbox" id="checkbox1" class="material-control-input">
                                <span class="material-control-indicator"></span>
                                <span class="description">5:45 PM - 6:15 PM</span>
                            </label>
                        </div>
                        <div class="custom-controls-stacked">
                            <label class="custom-control material-checkbox">
                                <input type="checkbox" id="checkbox1" class="material-control-input">
                                <span class="material-control-indicator"></span>
                                <span class="description">5:45 PM - 6:15 PM</span>
                            </label>
                        </div>
                        <div class="custom-controls-stacked">
                            <label class="custom-control material-checkbox">
                                <input type="checkbox" id="checkbox1" class="material-control-input">
                                <span class="material-control-indicator"></span>
                                <span class="description">5:45 PM - 6:15 PM</span>
                            </label>
                        </div>
                        <div class="custom-controls-stacked">
                            <label class="custom-control material-checkbox">
                                <input type="checkbox" id="checkbox1" class="material-control-input">
                                <span class="material-control-indicator"></span>
                                <span class="description">5:45 PM - 6:15 PM</span>
                            </label>
                        </div>
                        <div class="custom-controls-stacked">
                            <label class="custom-control material-checkbox">
                                <input type="checkbox" id="checkbox1" class="material-control-input">
                                <span class="material-control-indicator"></span>
                                <span class="description">5:45 PM - 6:15 PM</span>
                            </label>
                        </div>
                        <div class="custom-controls-stacked">
                            <label class="custom-control material-checkbox">
                                <input type="checkbox" id="checkbox1" class="material-control-input">
                                <span class="material-control-indicator"></span>
                                <span class="description">5:45 PM - 6:15 PM</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="submit_button">
                    <button type="submit" class="theme-btn-two">Schedule</button>
                </div>
            </div>
        </div>
    </div>
    <!--End Login Popup-->

    <!--Login Popup-->
    <div id="open_popup_box3" class="open_popup_box">
        <div class="popup_inner">
            <div class="popup_close_btn"><i class="icon-arrow-left1"></i></div>
            <div class="popup_overlay_layer"></div>
            <div class="restaurant_location_box">
                <h2 class="restaurant_name">Delivery details</h2>
                <div class="select_schedule_time_box">
                    <form action="#">
                        <div class="form-group location_search">
                            <label for="locationSearch">34B Yehia Ibrahim, Mohammed Mazhar, Zamalek, Cairo Governorate 11561, Egypt</label>
                            <input id="locationSearch" type="search" placeholder="">
                            <i class="icon-map-pin" id="search_Icon"></i>
                        </div>
                        <h6 class="sub_title">Delivery options</h6>
                        <div class="form-group delivery_form deliveryOption">
                            <select id="deliveryOption" name="deliveryOption">
                                <option value="meetAtDoor">Meet at door</option>
                                <option value="meetOutside">Meet outside</option>
                                <option value="leaveAtDoor">Leave at door</option>
                            </select>
                        </div>
                        <div class="form-group delivery_form">
                            <input type="text" placeholder="Apartment, suite or floor">
                        </div>
                        <div class="form-group delivery_form">
                            <input type="text" placeholder="Business name">
                        </div>
                        <div class="form-group delivery_form">
                            <textarea type="textarea" placeholder="Add delivery instructions"></textarea>
                        </div>
                        <h6 class="sub_title">Save this address?</h6>
                        <div class="form-group delivery_form pl_70">
                            <div class="rating_icon"><i class="icon-star"></i></div>
                            <input type="text" placeholder="Add a label (e.g. school)">
                        </div>
                        <div class="form-group delivery_form mt_50">
                            <button type="submit" class="theme-btn-two">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Login Popup-->

    <form action="{{ route('user.order.store') }}" method="post">
        @csrf
        <input type="hidden" name="shop_id" id="shop_id" value="{{ $cart->shop['id'] }}">
        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="cart_id" id="cart_id" value="{{ $cart->id }}">

        <!--CheckOut Section -->
        <section class="checkout_section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <div class="checkout_left_side">
                            <div class="mb-4">
                                <a href="{{ route('main.shop.show', $cart->shop['id'])}}?category={{ $cart->shop['category']['slug'] }}">
                                    <i class="fa-solid fa-arrow-left"></i> Go to Store Back
                                </a>
                            </div>
                            <div class="title_box">
                                <h3 class="section_title mb_0">Delivery details</h3>
                                <div class="dealivary_box_selector">
                                    <div id="selectorButtons">
                                        <button class="selector-button active" onclick="selectOption('delivery')">Delivery</button>
                                        <button class="selector-button" onclick="selectOption('pickup')">Pickup</button>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout_map_box">
                                <img src="{{ url('assets/frontend/images/map-2.png') }}" alt="">
                            </div>
                            <div class="delivery_details_data delivery_data_box">
                                <div class="details_data selct_location_box location_box active" data-id="location">
                                    <div class="details_data_left">
                                        <div class="icon_box">
                                            <i class="icon-map-pin"></i>
                                        </div>
                                        <div class="location_info">
                                            <input type="radio" class="address_radio" name="address_type" id="location" value="location" checked>
                                            <input type="hidden" name="location_id" value="{{ $location->id }}">
                                            <h6 class="location_name">{{ Auth::user()->location['city']}}</h6>
                                            <span class="location">123 Fake Street, {{ $location->city }}, {{ $location->region }}, {{ $country['name'] }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="details_data_right">
                                        <div class="edit_button popup_open_btn">
                                            <i class="icon-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="details_data meet_at_door_box location_box" data-id="door">
                                    <div class="details_data_left">
                                        <div class="icon_box">
                                            <i class="icon-user-two"></i>
                                        </div>
                                        <div class="location_info">
                                            <input type="radio" class="address_radio" name="address_type" id="door">
                                            <input type="hidden" name="address_id" value="">
                                            <h6 class="location_name">Meet at my door</h6>
                                            <span class="instructions_text">Add delivery instructions</span>
                                        </div>
                                    </div>
                                    <div class="details_data_right">
                                        <div class="edit_button popup_open_btn3">
                                            <i class="icon-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="delivery_estimate_data delivery_data_box">
                                <h3 class="section_title">Delivery estimate</h3>
                                <div class="details_data selct_location_box delivery_time" data-id="priority">
                                    <div class="details_data_left">
                                        <div class="icon_box electricity_icon">
                                            <i class="icon-electricity"></i>
                                        </div>
                                        <div class="location_info">
                                            <input type="radio" class="delivery_radio" name="delivery_time_type" id="priority" value="priority">
                                            <h6 class="location_name">Priority</h6>
                                            <span class="location">20—35 min • Delivered directly to you</span>
                                        </div>
                                    </div>
                                    <div class="details_data_right">
                                        <span class="rate">+$7.99</span>
                                    </div>
                                </div>
                                <div class="details_data selct_location_box delivery_time active" data-id="standard">
                                    <div class="details_data_left">
                                        <div class="icon_box">
                                            <i class="icon-rocket"></i>
                                        </div>
                                        <div class="location_info">
                                            <input type="radio" class="delivery_radio" name="delivery_time_type" id="standard" value="standard" checked>
                                            <h6 class="location_name">Standard</h6>
                                            <span>25—40 min</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="details_data selct_location_box popup_open_btn2 delivery_time" data-id="schedule">
                                    <div class="details_data_left">
                                        <div class="icon_box">
                                            <i class="icon-calendar"></i>
                                        </div>
                                        <div class="location_info">
                                            <input type="radio" class="delivery_radio" name="deliver_time_type" id="schedule" value="schedule">
                                            <h6 class="location_name">Schedule</h6>
                                            <span>Select a time</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="delivery_payment_data delivery_data_box">
                                <h3 class="section_title">Payment</h3>
                                <div class="details_data selct_location_box">
                                    <div class="details_data_left">
                                        <div class="icon_box">
                                            <i class="icon-card"></i>
                                        </div>
                                        <div class="location_info">
                                            <h6>Add payment method</h6>
                                        </div>
                                    </div>
                                    <div class="details_data_right">
                                        <div class="edit_button">
                                            <i class="icon-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="details_data selct_location_box">
                                    <div class="details_data_left">
                                        <div class="icon_box">
                                            <i class="icon-tag"></i>
                                        </div>
                                        <div class="location_info">
                                            <h6>Add promo code</h6>
                                        </div>
                                    </div>
                                    <div class="details_data_right">
                                        <div class="edit_button">
                                            <i class="icon-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order_delivery_data delivery_data_box">
                                <div class="title_box">
                                    <h3 class="section_title">Order summary</h3>
                                    <div class="add_item_btn"><i class="icon-plus"></i>Add items</div>
                                </div>
                                <h5>{{ $cart->items->count() }} items</h5>

                                @foreach($cart->items as $item)
                                <div class="details_data selct_location_box">
                                    <div class="details_data_left">
                                        <div class="icon_box">
                                            <img src="{{ getFileUrl($item->menuItem['thumbnail']) }}" alt="">
                                        </div>
                                        <div class="location_info">
                                            <h6>{{ $item->menuItem['name'] }}</h6>
                                            <span>Quantity: {{ $item->quantity }}</span>
                                        </div>
                                    </div>
                                    <div class="details_data_right">
                                        @php
                                        $get_sub_total = $item->quantity * $item->menuItem['price'];
                                        $sub_total = number_format((float)$get_sub_total, 2, '.', '');
                                        @endphp
                                        <span class="rate">${{ $sub_total }}</span>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-12">
                        <div class="checkout_right_side">
                            <h3 class="section_title">Order total</h3>
                            <div class="order_price_list">
                                <div class="order_price">
                                    <div class="order_catagories">Subtotal</div>
                                    <div class="order_amount">${{ $total }}</div>
                                    <input type="hidden" name="sub_total" value="{{ $total }}">
                                </div>
                                <div class="order_price">
                                    <div class="order_catagories">Delivery Fee <i class="icon-information-two"></i></div>
                                    <div class="order_amount">$ {{ $shop->delivery_charge == '' ? '0.00' : $shop->delivery_charge }}</div>
                                    <input type="hidden" name="delivery_fee" value="{{ $shop->delivery_charge == '' ? '0.00' : $shop->delivery_charge }}">
                                </div>
                                <div class="order_price">
                                    <div class="order_catagories">Taxes & Other Fees <i class="icon-information-two"></i></div>
                                    <div class="order_amount">$6.11</div>
                                    <input type="hidden" name="tax" value="6.11">
                                </div>
                                <div class="order_price order_total">
                                    <div class="order_catagories">Total</div>
                                    @php
                                    $get_total = $total + $shop->delivery_charge + 6.11;
                                    $main_total = number_format((float)$get_total, 2, '.', '');
                                    @endphp
                                    <div class="order_amount">${{ $main_total }}</div>
                                    <input type="hidden" name="total" value="{{ $main_total }}">
                                </div>
                            </div>
                            <span>Prices may be lower in store.
                                If you’re not around when the delivery person arrives, they’ll leave your order at the door. By placing your order, you agree to take full responsibility for it once it’s delivered. Orders containing alcohol or other restricted items may not be eligible for leave at door and will be returned to the store if you are not available.
                                Estimated pricing: We’ll put a hold on your card for up to $15.05. If any changes are made to your order to account for things like replacements or the actual weight of items, they will be reflected in the final charge on your receipt.</span>
                            <div class="link_btn">
                                <button type="submit" class="theme-btn-two" style="height: auto;">Continue to payment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--CheckOut Section End -->

    </form>


    @section('scripts')
    <script>
        $(document).on('click', '.location_box', function() {
            $('.location_box').removeClass('active');
            $('.address_radio').removeAttr("checked");

            let input_id = $(this).attr('data-id');
            $(this).addClass('active');
            $('#' + input_id).attr('checked', 'checked');
        })


        $(document).on('click', '.delivery_time', function() {
            $('.delivery_time').removeClass('active');
            $('.delivery_radio').removeAttr("checked");

            let input_id = $(this).attr('data-id');
            $(this).addClass('active');
            $('#' + input_id).attr('checked', 'checked');
        })
    </script>
    @endsection
</x-app-layout>