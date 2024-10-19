@extends('layouts.merchant')

@section('body')
<section class="main_banner style_2" style="background-image: url({{ asset('assets/merchant/images/update-image/banner_2.jpg') }})">
    <div class="container-fulid">
        <div class="banner_content_box style_2">
            <h1 class="banner_title">Good food, <br>fast delivery, <br>happy customers!</h1>
            <p class="banner_text">Our mission is to provide our customers with
                the highest quality food and the most convenient
                delivery experience.</p>
        </div>
        <div class="apply_form">
            <h6>Become our business partner</h6>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('merchant.register') }}" method="POST" id="creating-account-form" class="defult-form style_three">
                @csrf
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                        @php
                        $countries = App\Models\Country::all();
                        @endphp
                        <div class="input_box select-box">
                            <select class="wide" name="country_id" id="country_id">
                                <option data-display="Country">Country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}" {{ $current_country == $country->iso2 ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                        <div class="input_box select-box">
                            <select id="city_id" class="wide" name="city_id">
                                <option data-display="City">City</option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ $current_city == $city->name ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                        <input type="text" class="form-control" placeholder="Restaurant Name" name="company_name" id="company_name">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                        <input type="text" class="form-control" placeholder="Address" name="address" id="address">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                        <input type="text" class="form-control" placeholder="Postcode" name="post_code" id="post_code">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 form-group style-two">
                        {{-- <input type="text" name="code" id="code" class="w-100"> --}}
                        {{-- <input type="phone" class="form-control" name="phone" placeholder="Phone" id="phone"
                                required> --}}
                        <input type="tel" name="phone" id="phone">
                        <span id="valid-msg" class="d-none text-success">✓ Valid</span>
                        <span id="error-msg" class="hide text-danger"></span>
                    </div>
                    <input type="hidden" name="calling_code" id="calling_code">
                    <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                    </div>



                    <div class="col-xl-7 col-lg-7 col-md-12 form-group">
                        @if(isset($location))
                        <input type="text" class="form-control" placeholder="Location of Restaurent" name="location" id="location" value="{{ $location->city }}, {{ $location->region }}, {{ $location_country->name }}">
                        <input type="hidden" class="form-control" name="location_id" id="location_id" value="{{ $location->id }}">
                        @else
                        <input type="text" class="form-control" placeholder="Location of Restaurent" name="location" id="location">
                        <input type="hidden" class="form-control" name="location_id" id="location_id">
                        @endif
                        <a href="javascript:void(0)" id="get_location" class="sign_in login-box-outer">Get my Current Location</a>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-12 form-group">
                        @php
                        $categories = App\Models\ShopCategory::all();
                        @endphp
                        <div class="input_box select-box">
                            <select class="wide" name="shop_category_id" id="shop_category_id">
                                <option data-display="Cuisine Type">Cuisine Type</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="userType" value="1">
                    <div class="col-xl-12 col-lg-12 col-md-12 form-group check_box">
                        <input class="check" type="checkbox" id="checkbox" required>
                        <label for="checkbox">By clicking 'Apply', you agree to our Terms of Use, <br> Privacy Policy,
                            and Cookie Policy.</label>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 form-group style-three">
                        <strong>Already have an account?</strong>
                        <a href="{{ route('login')}}" class="sign_in login-box-outer">Sign in</a>
                    </div>
                    {{-- <div class="col-xl-12 col-lg-12 col-md-12 form-group style-three">
                            <div class="g-recaptcha" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                        </div> --}}
                    <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                        <button type="submit">Apply</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Feature Section Main Home -->
<section class="feature_section_three">
    <div class="container">
        <div class="section_title text-center">
            <h1>Why <span>Virtue Eats?</span></h1>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="feature_block_1 text-center">
                    <div class="feature_block_1_icon_box"><span class="flaticon-paper-plane"></span></div>
                    <h3 class="feature_block_1_title"><a href="#">Deliver your way</a></h3>
                    <p class="feature_block_1_text">Register with us and get
                        take advantage of the free launch.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="feature_block_1 text-center">
                    <div class="border_box"></div>
                    <div class="feature_block_1_icon_box"><span class="flaticon-eye"></span></div>
                    <h3 class="feature_block_1_title"><a href="#">Boost your visibility </a></h3>
                    <p class="feature_block_1_text">Access to in-app safety features
                        and our 24/7 support team.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="feature_block_1 text-center">
                    <div class="feature_block_1_icon_box"><span class="flaticon-route"></span></div>
                    <h3 class="feature_block_1_title"><a href="#">Connect With Customers</a></h3>
                    <p class="feature_block_1_text">You can know the destination
                        before the accepting the trip and you
                        can work in your time.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Feature Section Main Home -->

<!-- Store Kitchen Section Home -->
<section class="how-much-can-earn-2">
    <div class="container">
        <div class="section_title text-center">
            <h1>Store Kitchen</h1>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="block_item_1">
                    <figure class="block_item_1_image">
                        <img src="{{ asset('assets/merchant/images/update-image/kitchen_image_1.jpg') }}" alt="">
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
                        <img src="{{ asset('assets/merchant/images/update-image/kitchen_image_1.jpg') }}" alt="">
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
                        <img src="{{ asset('assets/merchant/images/update-image/kitchen_image_1.jpg') }}" alt="">
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
<!-- Store Kitchen Section Home End -->

<section class="meal_at_time">
    <div class="container-fluid">
        <div class="section_title text-center">
            <h1>Delivering happiness, <br>one <span>meal at a time.</span></h1>
        </div>
        <div class="mail_tag_shape">
            <div class="tag repaid-delivery">Rapid delivery</div>
            <div class="tag express-delivery">Express delivery</div>
            <div class="tag speedy-delivery">Speedy delivery</div>
        </div>
        <div class="swiper-container two-item-carousel">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="meal_slide_item">
                        <div class="meal_lide_image">
                            <img src="{{ asset('assets/merchant/images/update-image/meal_image_1.jpg') }}" alt="">
                        </div>
                        <h3 class="meal_slide_title"><a href="#">Lorem Ipsum Dolor Sit Amet</a></h3>
                        <p class="meal_slide_text">consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="meal_slide_item">
                        <div class="meal_lide_image">
                            <img src="{{ asset('assets/merchant/images/update-image/meal_image_2.jpg') }}" alt="">
                        </div>
                        <h3 class="meal_slide_title"><a href="#">Lorem Ipsum Dolor Sit Amet</a></h3>
                        <p class="meal_slide_text">consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="meal_slide_item">
                        <div class="meal_lide_image">
                            <img src="{{ asset('assets/merchant/images/update-image/meal_image_3.jpg') }}" alt="">
                        </div>
                        <h3 class="meal_slide_title"><a href="#">Lorem Ipsum Dolor Sit Amet</a></h3>
                        <p class="meal_slide_text">consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="meal_slide_item">
                        <div class="meal_lide_image">
                            <img src="{{ asset('assets/merchant/images/update-image/meal_image_4.jpg') }}" alt="">
                        </div>
                        <h3 class="meal_slide_title"><a href="#">Lorem Ipsum Dolor Sit Amet</a></h3>
                        <p class="meal_slide_text">consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="meal_slide_item">
                        <div class="meal_lide_image">
                            <img src="{{ asset('assets/merchant/images/update-image/meal_image_5.jpg') }}" alt="">
                        </div>
                        <h3 class="meal_slide_title"><a href="#">Lorem Ipsum Dolor Sit Amet</a></h3>
                        <p class="meal_slide_text">consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="meal_slide_item">
                        <div class="meal_lide_image">
                            <img src="{{ asset('assets/merchant/images/update-image/meal_image_6.jpg') }}" alt="">
                        </div>
                        <h3 class="meal_slide_title"><a href="#">Lorem Ipsum Dolor Sit Amet</a></h3>
                        <p class="meal_slide_text">consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
            </div>
            <div class="cause-slider-nav">
                <div class="cause-slider-control slider-button-prev"><span><i class="flaticon-left-arrow"></i></span>
                </div>
                <div class="cause-slider-control slider-button-next"><span><i class="flaticon-right-arrow-1"></i></span></div>
            </div>
            <div class="slider__pagination"></div>
        </div>
    </div>
</section>

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
                        <p>With Virtueats daily quests and attractive Spcial Offers, you can enter regularly. Get
                            your payment on time with Virtueats. you will never face a delay in payment. Get your
                            payment in the shortest Time!</p>
                    </div>
                </li>
                <li class="accordion block active-block">
                    <div class="acc-btn active">
                        <div class="icon-outer"><i class="flaticon-down-1"></i></div>
                        <h5>How does delivering with virtue eat work?</h5>
                    </div>
                    <div class="acc-content current">
                        <p>The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure
                            itself, but because those who do not know how to pursue pleasure.</p>
                    </div>
                </li>
                <li class="accordion block">
                    <div class="acc-btn">
                        <div class="icon-outer"><i class="flaticon-down-1"></i></div>
                        <h5>How does delivering with virtue eat work?</h5>
                    </div>
                    <div class="acc-content">
                        <p>The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure
                            itself, but because those who do not know how to pursue pleasure.</p>
                    </div>
                </li>
                <li class="accordion block">
                    <div class="acc-btn">
                        <div class="icon-outer"><i class="flaticon-down-1"></i></div>
                        <h5>How does delivering with virtue eat work?</h5>
                    </div>
                    <div class="acc-content">
                        <p>The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure
                            itself, but because those who do not know how to pursue pleasure.</p>
                    </div>
                </li>
                <li class="accordion block">
                    <div class="acc-btn">
                        <div class="icon-outer"><i class="flaticon-down-1"></i></div>
                        <h5>How does delivering with virtue eat work?</h5>
                    </div>
                    <div class="acc-content">
                        <p>The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure
                            itself, but because those who do not know how to pursue pleasure.</p>
                    </div>
                </li>
                <li class="accordion block">
                    <div class="acc-btn">
                        <div class="icon-outer"><i class="flaticon-down-1"></i></div>
                        <h5>How does delivering with virtue eat work?</h5>
                    </div>
                    <div class="acc-content">
                        <p>The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure
                            itself, but because those who do not know how to pursue pleasure.</p>
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
                <img src="{{ asset('assets/images/update-image/map-image.png') }}" alt="">
            </figure>
        </div>
    </div>
</section>
<!-- End Map Section Main Home -->
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.7/build/js/intlTelInput.min.js"></script>
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

    $('#get_location').click(function(){
        $.ajax({
            type: "get",
            url: `{{ route('get.location') }}`,
            success: function(response) {
                $('#location').val(response.location.city+', '+response.location.region+', '+response.country.name)
            }
        });
    })

    // var input = document.querySelector("#code");

    // window.intlTelInput(input, ({

    //     allowExtensions: true,
    //     autoFormat: false,
    //     autoHideDialCode: false,
    //     autoPlaceholder: false,
    //     defaultCountry: "auto",
    //     // ipinfoToken: "yolo",
    //     nationalMode: false,
    //     numberType: "MOBILE",
    //     //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    //     //preferredCountries: ['cn', 'jp'],
    //     preventInvalidNumbers: true,
    //     utilsScript: "lib/libphonenumber/build/utils.js"


    // }));


    const input = document.querySelector("#phone");
    window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.7/build/js/utils.js",

    });


    const button = document.querySelector("#btn");
    const errorMsg = document.querySelector("#error-msg");
    const validMsg = document.querySelector("#valid-msg");

    // here, the index maps to the error code returned from getValidationError - see readme
    const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

    // initialise plugin
    const iti = window.intlTelInput(input, {
        initialCountry: "au",
        hiddenInput: () => "full_phone",
        showSelectedDialCode: true,
        // separateDialCode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.7/build/js/utils.js?1710377899615"
    });

    const reset = () => {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("d-none");
    };

    const showError = (msg) => {
        input.classList.add("error");
        errorMsg.innerHTML = msg;
        errorMsg.classList.remove("hide");
    };

    $("#phone").focusout(function() {
        reset();
        if (!input.value.trim()) {
            showError("Required");
        } else if (iti.isValidNumberPrecise()) {
            validMsg.classList.remove("d-none");
        } else {
            const errorCode = iti.getValidationError();
            const msg = errorMap[errorCode] || "Invalid number";
            showError(msg);
        }


    });



    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);
</script>
@endsection