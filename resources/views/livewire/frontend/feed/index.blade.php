<div>


    <!-- Food Categores Section -->

    <section class="food_categories_section">
        <div class="container">
            <div class="categories_outer_outer">

                @foreach($categories as $category)
                <a href="javascript:void(0)" wire:click="getProductByCategory({{ $category->id }})" class="categories_item {{ $activeClass == $category->slug ? 'active' : '' }}">
                    <div class="categories_logo">
                        <img src="{{ getFileUrl($category->thumbnail) }}" alt="">
                    </div>
                    <h6 class="categories_title">{{ $category->name }}</h6>
                </a>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Food Categores Section End -->

    <!-- Food Banner Section -->
    <section class="foods_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12 banner-colmun">
                    <div class="foods_banner foods_banner_one">
                        <div class="foods_banner_left">
                            <h4 class="foods_banner_title">Get 20% off your first order!</h4>
                            <div class="order_now_btn"><a href="#">Order now</a></div>
                        </div>
                        <div class="foods_banner_right">
                            <div class="foods_box">
                                <img src="{{ url('assets/frontend/images/foods_banner_one.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 banner-colmun">
                    <div class="foods_banner foods_banner_two">
                        <div class="foods_banner_left">
                            <h4 class="foods_banner_title">Get 20% off your first order!</h4>
                            <div class="order_now_btn"><a href="#">Order now</a></div>
                        </div>
                        <div class="foods_banner_right">
                            <div class="foods_box">
                                <img src="{{ url('assets/frontend/images/foods_banner_two.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 banner-colmun">
                    <div class="foods_banner foods_banner_three">
                        <div class="foods_banner_left">
                            <h4 class="foods_banner_title">Get 20% off your first order!</h4>
                            <div class="order_now_btn"><a href="#">Order now</a></div>
                        </div>
                        <div class="foods_banner_right">
                            <div class="foods_box">
                                <img src="{{ url('assets/frontend/images/foods_banner_three.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Food Banner Section End -->

    <!--Filter Box Start -->
    <section class="filter_box">
        <div class="container">
            <div class="filter_box_outer">
                <div class="nav nav-tabs">
                    <div id="filter_box_one" class="dropdown">
                        <button onclick="toggleDropdown('myDropdown1')" class="dropbtn">Delivery Fee <div class="dropdown_btn"><i class="icon-caret-down"></i></div></button>
                        <div id="myDropdown1" class="dropdown-content">
                            <div class="filter_block_box">
                                <div class="filter_block_cross_btn"><i class="icon-plus"></i></div>
                                <h3 class="filter_block_title">Delivery fee</h3>
                                <div id="selected-price">Under Delivery</div>
                                <div id="progress-container">
                                    <div id="progress-bar"></div>
                                </div>
                                <div class="price-options">
                                    <div class="price-btn" onclick="setProgress(1)">1$</div>
                                    <div class="price-btn" onclick="setProgress(2)">2$</div>
                                    <div class="price-btn" onclick="setProgress(4)">4$</div>
                                    <div class="price-btn" onclick="setProgress(6)">6$+</div>
                                </div>
                                <div class="btn_box_outer">
                                    <button class="button_style_one" type="button" onclick="resetProgress()">Reset</button>
                                    <button class="button_style_two" type="button" id="apply-btn" onclick="applyProgress()">Apply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="filter_box_one" class="dropdown">
                        <button onclick="toggleDropdown('myDropdown2')" class="dropbtn">
                            <div class="offer_icon icon"><i class="icon-tag"></i></div> Offers
                        </button>
                    </div>
                    <div id="filter_box_one" class="dropdown">
                        <button onclick="toggleDropdown('myDropdown3')" class="dropbtn">
                            <div class="rating_icon icon"><i class="icon-star"></i></div> Rating <div class="dropdown_btn"><i class="icon-caret-down"></i></div>
                        </button>
                        <div id="myDropdown3" class="dropdown-content">
                            <div class="filter_block_box">
                                <div class="filter_block_cross_btn"><i class="icon-plus"></i></div>
                                <h3 class="filter_block_title">Rating</h3>
                                <div class="rating_selector_box">
                                    <div id="rating_selector_box">Over:</div>
                                    <div id="selector-bar-container">
                                        <div id="selector-bar"></div>
                                    </div>
                                    <div class="rating-options">
                                        <button class="rating-btn" type="button" onclick="setRating(1)">3+</button>
                                        <button class="rating-btn" type="button" onclick="setRating(2)">3.5+</button>
                                        <button class="rating-btn" type="button" onclick="setRating(4)">4+</button>
                                        <button class="rating-btn" type="button" onclick="setRating(6)">4.5+</button>
                                    </div>
                                    <div class="btn_box_outer">
                                        <button class="button_style_one" type="button" onclick="resetRating()">Reset</button>
                                        <button class="button_style_two" type="button" id="apply-btn1" onclick="applyRating()">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="filter_box_one" class="dropdown">
                        <button onclick="toggleDropdown('myDropdown4')" class="dropbtn">Under 30 mins</button>
                    </div>
                    <div id="filter_box_one" class="dropdown">
                        <button onclick="toggleDropdown('myDropdown5')" class="dropbtn">Price <div class="dropdown_btn"><i class="icon-caret-down"></i></div></button>
                        <div id="myDropdown5" class="dropdown-content">
                            <div class="filter_block_box">
                                <div class="filter_block_cross_btn"><i class="icon-plus"></i></div>
                                <h3 class="filter_block_title">Price</h3>
                                <form id="donationForm">
                                    <div class="amount_list">
                                        <div class="amount" onclick="selectAmount(1)" id="amount1">$</div>
                                        <div class="amount" onclick="selectAmount(2)" id="amount2">$$</div>
                                        <div class="amount" onclick="selectAmount(3)" id="amount3">$$$</div>
                                        <div class="amount" onclick="selectAmount(4)" id="amount4">$$$$</div>
                                    </div>
                                    <div class="btn_box_outer">
                                        <button class="button_style_two" type="button" onclick="resetSelection()">Reset</button>
                                        <button class="button_style_one" type="button" onclick="submitDonation()">Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="filter_box_one" class="dropdown">
                        <button onclick="toggleDropdown('myDropdown6')" class="dropbtn">
                            <div class="topper_icon icon"><i class="icon-topper"></i></div> Best overall
                        </button>
                    </div>
                    <div id="filter_box_one" class="dropdown">
                        <button onclick="toggleDropdown('myDropdown7')" class="dropbtn">Dietary <div class="dropdown_btn"><i class="icon-caret-down"></i></div></button>
                        <div id="myDropdown7" class="dropdown-content">
                            <div class="filter_block_box">
                                <div class="filter_block_cross_btn"><i class="icon-plus"></i></div>
                                <h3 class="filter_block_title">Dietary</h3>
                                <form class="checkout_box_outer" id="checkboxForm">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" id="checkbox1" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="description">Vegetarian</span>
                                        </label>
                                    </div>
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" id="checkbox2" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="description">Vegan</span>
                                        </label>
                                    </div>
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" id="checkbox3" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="description">Gluten- free</span>
                                        </label>
                                    </div>
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" id="checkbox4" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="description">Halal</span>
                                        </label>
                                    </div>
                                    <div class="btn_box_outer">
                                        <button class="button_style_two" type="button" onclick="resetForm()">Reset</button>
                                        <button class="button_style_one" type="button" onclick="applyChanges()">Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="filter_box_one" class="dropdown">
                        <button onclick="toggleDropdown('myDropdown8')" class="dropbtn">Sort</button>
                        <div id="myDropdown8" class="dropdown-content">
                            <div class="filter_block_box">
                                <div class="filter_block_cross_btn"><i class="icon-plus"></i></div>
                                <h3 class="filter_block_title">Sort</h3>
                                <form class="checkout_box_outer" id="checkboxForm2">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" id="checkbox5" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="description">Recommended</span>
                                        </label>
                                    </div>
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" id="checkbox6" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="description">Rating</span>
                                        </label>
                                    </div>
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" id="checkbox7" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="description">Most popular</span>
                                        </label>
                                    </div>
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" id="checkbox8" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="description">Delivery time</span>
                                        </label>
                                    </div>
                                    <div class="btn_box_outer">
                                        <button class="button_style_two" type="button" onclick="resetForm2()">Reset</button>
                                        <button class="button_style_one" type="button" onclick="applyChanges2()">Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Filter Box End -->

    <!--Offer Section Start -->
    <section class="offer_section">
        <div class="container">
            <div class="title_box">
                <h3 class="section_title">Today's Offer</h3>
                <div class="view_all_btn"><a href="#">See All</a></div>
            </div>
            <div class="product_slide">
                <div class="owl-carousel owl-theme thm-owl__carousel">
                    @foreach($shops as $shop)
                    <div class="product_block_one" wire:key="{{ $shop->id }}">
                        <div class="product_image_box">
                            <div class="product_image">
                                <a href="{{ route('main.shop.show', $shop->id)}}?category={{ $shop->category['slug'] }}" wire:navigate class="link_btn">
                                    @if($shop->banner == '')
                                    <img src="{{ url('assets/frontend/images/gallery.png') }}" alt="">
                                    @else
                                    <img src="{{ getFileUrl($shop->banner) }}" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="whish_list"><a href="#"><i class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product_content_box">
                            <h6 class="product_title"><a href="{{ route('main.shop.show', $shop->id)}}?category={{ $shop->category['slug'] }}" wire:navigate>{{ $shop->company_name }}</a>
                            </h6>
                            <span class="schedule_time">{{ $shop->delivery_time }}</span>
                            <div class="product_rating"><i class="icon-star"></i>4.6</div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--Offer Section Start End -->
    <!--Offer Section Start -->
    <section class="offer_section">
        <div class="container">
            <div class="title_box">
                <h3 class="section_title">Top Restaurants</h3>
                <div class="view_all_btn"><a href="#">See All</a></div>
            </div>
            <div class="product_slide">
                <div class="owl-carousel owl-theme thm-owl__carousel">
                    @foreach($shops as $shop)
                    <div class="product_block_one">
                        <div class="product_image_box">
                            <div class="product_image">
                                <a href="{{ route('main.shop.show', $shop->id)}}?category={{ $shop->category['slug'] }}" class="link_btn">
                                    @if($shop->banner == '')
                                    <img src="{{ url('assets/frontend/images/gallery.png') }}" alt="">
                                    @else
                                    <img src="{{ getFileUrl($shop->banner) }}" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="whish_list"><a href="#"><i class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product_content_box">
                            <h6 class="product_title"><a href="{{ route('main.shop.show', $shop->id)}}?category={{ $shop->category['slug'] }}">{{ $shop->company_name }}</a>
                            </h6>
                            <span class="schedule_time">{{ $shop->delivery_time }}</span>
                            <div class="product_rating"><i class="icon-star"></i>4.6</div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--Offer Section Start End -->


    @foreach($shops as $shop)
    <!--Offer Section Start -->
    <section class="offer_section">
        <div class="container">
            <div class="title_box">
                <h3 class="section_title">{{ $shop->company_name }}</h3>
                <div class="view_all_btn"><a href="#">See All</a></div>
            </div>
            <div class="product_slide">
                <div class="owl-carousel owl-theme thm-owl__carousel">

                    @foreach($shop->items as $item)
                    <div class="product_block_one">
                        <div class="product_image_box">
                            <div class="product_image">
                                <a href="{{ route('main.item.show', [$item->shop['id'], $item->id])}}?category={{ $item->category['slug'] }}" class="link_btn">
                                    <img src="{{ getFileUrl($item->thumbnail) }}" alt="" class="w-100">
                                </a>
                            </div>
                            <div class="whish_list"><a href="#"><i class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product_content_box pb-0">
                            <h6 class="product_title"><a href="{{ route('main.item.show', [$item->shop['id'], $item->id])}}?category={{ $item->category['slug'] }}">{{ $item->name }}</a>
                            </h6>
                            <span class="schedule_time">$ {{ $item->price }}</span>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--Offer Section Start End -->
    @endforeach
</div>

