@php
if (Session::has('location')) {
$set_location = Session::get('location');
$location_array = explode(', ', $set_location);
$location = App\Models\Location::where('city', $location_array[0])->first();
}
@endphp

<!--Search Bar Style One -->
<section class="search_bar_style_one">
    <div class="container">
        <div class="search_bar_outer">
            <div class="location_box">
                <div class="location_icon"><i class="icon-map-pin"></i></div>
                <div class="location_name"><a href="#">{{ $location->city }}</a> • <a href="#">Now <i class="fa-solid fa-angle-down"></i></a></div>
            </div>
            <form action="#" class="search_box">
                <div class="form-group">
                    <input type="text" id="locationInput" placeholder="Search in Mcdonald’s Restaurant">
                    <i class="icon-search" id="searchIcon"></i>
                    <span id="clearIcon">Clear</span>
                    <div id="suggestionsContainer"></div>
                </div>
            </form>
            <div class="dealivary_box_selector">
                <div id="selectorButtons">
                    <button class="selector-button active" onclick="selectOption('delivery')">Delivery</button>
                    <button class="selector-button" onclick="selectOption('pickup')">Pickup</button>
                    <button class="selector-button" onclick="selectOption('dineIn')">Dine-in</button>
                </div>
            </div>

            <!-- cart -->
            @if(isset($shop))

            @if(isset($cart))
            <!-- $cart = App\Models\Cart::where('shop_id', $shop->id)->where('user_id', Auth::user()->id)->first(); -->
            @include('partials.frontend.cart-box')
            @else
            @include('partials.frontend.shop-cart')
            @endif
            @else
            @include('partials.frontend.shop-cart')
            @endif


        </div>
    </div>
</section>
<!--Search Bar Style One End -->