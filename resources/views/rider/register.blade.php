@extends('layouts.merchant')

@section('body')
    <section class="main_banner"
        style="background-image: url({{ asset('assets/merchant/images/update-image/banner_1.jpg') }});">
        <div class="container-fulid">
            <div class="banner_content_box">
                <h1 class="banner_title">Delivering <br>deliciousness to <br>your doorstep.</h1>
                <p class="banner_text">Our mission is to provide our customers with
                    the highest quality food and the most convenient
                    delivery experience.</p>
            </div>
            <form class="banner_login_form">
                @php
                    $countries = App\Models\Country::all();
                @endphp
                <div class="input_box select-box">
                    <select class="wide" name="country_id">
                        <option data-display="Country">Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input_box select-box">
                    <select class="wide" name="city_id">
                        <option data-display="City">City</option>
                    </select>
                </div>
                <div class="input_box select-box">
                    <select class="wide" name="vehicle_type">
                        <option data-display="Vehicle">Vehicle</option>
                        @foreach (App\Enums\VehicleType::cases() as $item)
                            <option value="{{ $item->value }}">{{ ucfirst($item->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input_box">
                    {{-- <div class="popup_btn signup-toggler">Sign up</div> --}}
                    <button type="button" class="text-nowrap popup_btn signup-toggler" onclick="setToForm()">join now <span class="flaticon-right-arrow"></span></button>
                </div>
            </form>
        </div>
    </section>

    <!-- Feature Section Main Home -->
    <section class="feature_section_two">
        <div class="container">
            <div class="section_title text-center">
                <h1>Get started</h1>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="feature_block_1 text-center">
                        <div class="feature_block_1_icon_box"><span class="flaticon-right-arrow"></span></div>
                        <h3 class="feature_block_1_title"><a href="#">Sign up online</a></h3>
                        <p class="feature_block_1_text">Just tell us which city you'd like to drive
                            in and the type of license you have. We'll email
                            you with your next steps.</p>
                        <div class="feature_block_1_link_btn"><a href="#">Sign up online</a></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="feature_block_1 text-center">
                        <div class="border_box"></div>
                        <div class="feature_block_1_icon_box"><span class="flaticon-file"></span></div>
                        <h3 class="feature_block_1_title"><a href="#">Check driving requirements</a></h3>
                        <p class="feature_block_1_text">All kinds of people are eligible to drive with
                            virtue eat. Here’s what you need to know if
                            you’re driving in Cairo,</p>
                        <div class="feature_block_1_link_btn"><a href="#">Requirements</a></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="feature_block_1 text-center">
                        <div class="feature_block_1_icon_box"><span class="flaticon-car-1"></span></div>
                        <h3 class="feature_block_1_title"><a href="#">Get a vehicle</a></h3>
                        <p class="feature_block_1_text">You can sign up even if you don't have
                            a car that meets the vehicle requirements in
                            Egypt right now.</p>
                        <div class="feature_block_1_link_btn"><a href="#">Vehicle requirements</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feature Section Main Home -->

    <!-- How Much Section Main Home -->
    <section class="how-much-can-earn-1">
        <div class="container">
            <div class="section_title text-center">
                <h1>How much can I earn?</h1>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="block_item_1">
                        <figure class="block_item_1_image">
                            <img src="{{ asset('assets/merchant/images/update-image/block_image_1.jpg') }}" alt="">
                        </figure>
                        <div class="image-content centred">
                            <h5 class="block_item_1_title"><a href="#">Lorem Ipsum</a></h5>
                            <p class="block_item_1_text">Our food delivery service offers
                                a wide variety of delicious and healthy
                                meal options, delivered straight to your
                                doorstep for your convenience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="block_item_1">
                        <figure class="block_item_1_image">
                            <img src="{{ asset('assets/merchant/images/update-image/block_image_2.jpg') }}" alt="">
                        </figure>
                        <div class="image-content centred">
                            <h5 class="block_item_1_title"><a href="#">Lorem Ipsum</a></h5>
                            <p class="block_item_1_text">Our food delivery service offers
                                a wide variety of delicious and healthy
                                meal options, delivered straight to your
                                doorstep for your convenience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="block_item_1">
                        <figure class="block_item_1_image">
                            <img src="{{ asset('assets/merchant/images/update-image/block_image_3.jpg') }}" alt="">
                        </figure>
                        <div class="image-content centred">
                            <h5 class="block_item_1_title"><a href="#">Lorem Ipsum</a></h5>
                            <p class="block_item_1_text">Our food delivery service offers
                                a wide variety of delicious and healthy
                                meal options, delivered straight to your
                                doorstep for your convenience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How Much Section Main Home End -->

    <section class="more_money_section">
        <div class="container-fulid">
            <div class="section_title text-center">
                <h1>Join us and get the chance <br> to earn <span>more money.</span></h1>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="more_money_block">
                        <span class="more_money_block_tag">My Earnings</span>
                        <h6 class="more_money_block_date">Today</h6>
                        <h5 class="more_money_block_doller">+$600</h5>
                        <div class="more_money_block_icon">
                            <img src="{{ asset('assets/merchant/images/update-image/more_money.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="more_money_block">
                        <span class="more_money_block_tag">My Earnings</span>
                        <h6 class="more_money_block_date">Today</h6>
                        <h5 class="more_money_block_doller">+$300</h5>
                        <div class="more_money_block_icon">
                            <img src="{{ asset('assets/merchant/images/update-image/more_money.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="more_money_block">
                        <span class="more_money_block_tag">My Earnings</span>
                        <h6 class="more_money_block_date">Today</h6>
                        <h5 class="more_money_block_doller">+$700</h5>
                        <div class="more_money_block_icon">
                            <img src="{{ asset('assets/merchant/images/update-image/more_money.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="more_money_block">
                        <span class="more_money_block_tag">My Earnings</span>
                        <h6 class="more_money_block_date">Today</h6>
                        <h5 class="more_money_block_doller">+$900</h5>
                        <div class="more_money_block_icon">
                            <img src="{{ asset('assets/merchant/images/update-image/more_money.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Section Main Home -->
    <section class="feature_section_two">
        <div class="container">
            <div class="section_title text-center">
                <h1>Driver extras</h1>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="feature_block_1 text-center">
                        <div class="feature_block_1_icon_box"><span class="flaticon-headphones"></span></div>
                        <h3 class="feature_block_1_title"><a href="#">Get support</a></h3>
                        <p class="feature_block_1_text">Let’s make every Uber trip hassle-free.
                            Our support pages can help you set
                            up your account, get started with the app,
                            adjust fares, and much more.</p>
                        <div class="feature_block_1_link_btn"><a href="#">Get help</a></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="feature_block_1 text-center">
                        <div class="border_box"></div>
                        <div class="feature_block_1_icon_box"><span class="flaticon-chat-1"></span></div>
                        <h3 class="feature_block_1_title"><a href="#">Contact us</a></h3>
                        <p class="feature_block_1_text">Got questions? Get answers. Enjoy personal
                            support at an Uber Greenlight Hub in
                            Cairo and Alexandria.</p>
                        <div class="feature_block_1_link_btn"><a href="#">Contact us</a></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="feature_block_1 text-center">
                        <div class="feature_block_1_icon_box"><span class="flaticon-security"></span></div>
                        <h3 class="feature_block_1_title"><a href="#">Drive safely</a></h3>
                        <p class="feature_block_1_text">The Uber app is full of features that help
                            you stay safe and confident before, during, and
                            after every trip And if you need help, Uber gives
                            you 24/7 support.</p>
                        <div class="feature_block_1_link_btn"><a href="#">Drive safely</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feature Section Main Home -->

    <!-- faq-page-section -->
    <section class="faq-page-section">
        <div class="container">
            <div class="section_title text-center">
                <h1>frequently asked questions</h1>
            </div>
            <div class="faq-content">
                <ul class="accordion-box style_2">
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"><i class="flaticon-down-1"></i></div>
                            <h5>How does delivering with virtue eat work?</h5>
                        </div>
                        <div class="acc-content">
                            <p>With Virtueats daily quests and attractive Spcial Offers, you can enter regularly. Get your
                                payment on time with Virtueats. you will never face a delay in payment. Get your payment in
                                the shortest Time!</p>
                        </div>
                    </li>
                    <li class="accordion block active-block">
                        <div class="acc-btn active">
                            <div class="icon-outer"><i class="flaticon-down-1"></i></div>
                            <h5>How does delivering with virtue eat work?</h5>
                        </div>
                        <div class="acc-content current">
                            <p>The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself,
                                but because those who do not know how to pursue pleasure.</p>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"><i class="flaticon-down-1"></i></div>
                            <h5>How does delivering with virtue eat work?</h5>
                        </div>
                        <div class="acc-content">
                            <p>The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself,
                                but because those who do not know how to pursue pleasure.</p>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"><i class="flaticon-down-1"></i></div>
                            <h5>How does delivering with virtue eat work?</h5>
                        </div>
                        <div class="acc-content">
                            <p>The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself,
                                but because those who do not know how to pursue pleasure.</p>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"><i class="flaticon-down-1"></i></div>
                            <h5>How does delivering with virtue eat work?</h5>
                        </div>
                        <div class="acc-content">
                            <p>The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself,
                                but because those who do not know how to pursue pleasure.</p>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"><i class="flaticon-down-1"></i></div>
                            <h5>How does delivering with virtue eat work?</h5>
                        </div>
                        <div class="acc-content">
                            <p>The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself,
                                but because those who do not know how to pursue pleasure.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- faq-page-section end -->

    <!-- Map Section Main Home -->
    <section class="map_section">
        <div class="container-fulid">
            <div class="section_title text-center">
                <h1>Operating in 5 Countries <span>Around the World</span></h1>
            </div>
            <div class="map-image">
                <figure>
                    <img src="{{ asset('assets/merchant/images/update-image/map-image.png') }}" alt="">
                </figure>
            </div>
        </div>
    </section>
    <!-- End Map Section Main Home -->
@endsection
@section('scripts')
    <script>
        $('select[name="country_id"]').on('change', function() {
            const id = $(this).val();
            let html = '<option data-display="City">City</option>';
            $.ajax({
                type: "get",
                url: `{{ route('city.get', '') }}/${id}`,
                success: function(response) {
                    response.cities.forEach(city => {
                        html +=
                            `<option value="${city.id}" data-display="${city.name}">${city.name}</option>`
                    });
                    $('select[name="city_id"]').html(html);
                    $('select').niceSelect('destroy'); //destroy the plugin 
                    $('select').niceSelect();
                }
            });
        });
        function setToForm() {
            $('input[name="country_id"]').val($('select[name="country_id"]').val());
            $('input[name="city_id"]').val($('select[name="city_id"]').val());
            $('input[name="vehicle_type"]').val($('select[name="vehicle_type"]').val());
        }
    </script>
@endsection
