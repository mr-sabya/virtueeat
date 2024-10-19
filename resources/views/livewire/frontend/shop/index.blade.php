<div>
    <!-- Restaurant Banner -->
    <section class="restaurant_banner">
        <div class="container">
            <div class="restaurant_banner_image">
                <div class="restaurant_image" style="overflow: hidden;">
                    @if($shop->banner == '')
                    <img src="{{ url('assets/frontend/images/gallery.png') }}" alt="">
                    @else
                    <img src="{{ getFileUrl($shop->banner) }}" alt="">
                    @endif
                </div>
                <ul class="restaurant_info">
                    <li class="whish_list"><a href="#"><i class="far fa-heart"></i></a></li>
                    <li class="info_icon"><a href="#" class="popup_open_btn"><img src="{{ url('assets/frontend/images/restaurant-info.svg') }}" alt=""></a></li>
                </ul>
            </div>
            <div class="restaurant_logo">
                <a href="#">
                    @if($shop->logo == '')
                    <img src="{{ url('assets/frontend/images/restaurant-logo.png') }}" alt="">
                    @else
                    <img src="{{ getFileUrl($shop->logo)}}" alt="">
                    @endif
                </a>
            </div>
            <div class="restaurant_banner_title">
                <h3 class="restaurant_name"><a href="{{ route('main.shop.show', $shop->id)}}?category={{ $shop->category['slug'] }}">{{ $shop->company_name }}</a></h3>
                <div class="restaurant_info_outer">
                    <div class="restaurant_schedule_time"><i class="icon-calendar"></i>Schedule</div>
                    <ul class="restaurant_about">
                        <li class="restaurant_rating_box"><i class="icon-star"></i> 4.4 (7,900+ ratings)</li>
                        <li class="restaurant_open_time_box">Open now • Closes at 9:10 PM</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Restaurant Banner End -->

    <!--Restaurant Page -->
    <section class="restaurant_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12">
                    <div class="restaurant_tag_list">


                        @foreach($shop->item_categories as $item_category)
                        <div class="custom-controls-stacked">
                            <a href="#category_{{ $item_category->id }}" class="item">
                                <div class="circle"></div>
                                <span class="description">{{ $item_category->name }}</span>
                            </a>
                        </div>
                        @endforeach



                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12">

                    @foreach($shop->item_categories as $item_category)
                    <div class="offer_section" id="category_{{ $item_category->id }}">
                        <div class="container">
                            <div class="title_box">
                                <h3 class="section_title">{{ $item_category->name }}</h3>
                                <div class="view_all_btn"><a href="#">See All</a></div>
                            </div>
                            <div class="product_slide">
                                <div class="owl-carousel owl-theme thm-owl__carousel" data-owl-options='{
                                        "loop": false,
                                        "autoplay": true,
                                        "margin": 26.67,
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
                                                    "items": 3
                                                }
                                            }
                                    }'>

                                    @foreach($item_category->menuItems as $menuItem)
                                    <div class="product_block_one ">
                                        <div class="product_image_box">
                                            <div class="product_image">
                                                <a href="{{ route('main.item.show', [$shop->id, $menuItem->id])}}?category={{ $menuItem->category['slug'] }}" class="link_btn">
                                                    @if($menuItem->thumbnail == '')
                                                    <img src="{{ url('assets/frontend/images/gallery.png') }}" alt="">
                                                    @else
                                                    <img src="{{ getFileUrl($menuItem->thumbnail) }}" alt="" class="w-100">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="whish_list"><a href="#"><i class="far fa-heart"></i></a></div>
                                        </div>
                                        <div class="product_content_box pb-0">
                                            <h6 class="product_title">
                                                <a href="{{ route('main.item.show', [$shop->id, $menuItem->id])}}?category={{ $menuItem->category['slug'] }}">{{ $menuItem->name }}</a>
                                            </h6>
                                            <span class="schedule_time">$ {{ $menuItem->price }}</span>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--Restaurant Page End -->
</div>