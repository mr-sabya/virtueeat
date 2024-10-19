<x-app-layout>

    @if($favorite_items->count() > 0)
    <!-- Search Section -->
    <div class="favorite_menu_page">
        <div class="container">
            <div class="favorite_outer_box outer_box">
                <h3 class="favorite_title">Favorite</h3>
                <div class="favorite_item_box">
                    <h6>Andrea El Mariouteya</h6>
                    <span>Friday, 27 Dec • 3 itmes</span>
                    <p>Falafel (deep-fried balls made with chickpeas, and spices)</p>
                    <div class="whish_list"><a href="#"><i class="far fa-heart"></i></a></div>
                </div>
                <div class="favorite_item_box">
                    <h6>Andrea El Mariouteya</h6>
                    <span>Friday, 27 Dec • 3 itmes</span>
                    <p>Falafel (deep-fried balls made with chickpeas, and spices)</p>
                    <div class="whish_list"><a href="#"><i class="far fa-heart"></i></a></div>
                </div>
                <div class="favorite_item_box">
                    <h6>Andrea El Mariouteya</h6>
                    <span>Friday, 27 Dec • 3 itmes</span>
                    <p>Falafel (deep-fried balls made with chickpeas, and spices)</p>
                    <div class="whish_list"><a href="#"><i class="far fa-heart"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    @else

    <div class="order_empty_page">
        <div class="container">
            <div class="empty_page_outer">
                <img src="assets/images/empty_order.png" alt="">
                <h1>No Favorite yet</h1>
                <p>When you place your first order, it will appear here</p>
                <div class="link_btn"><a href="#" class="theme-btn-two">Find Food</a></div>
            </div>
        </div>
    </div>
    <!-- Search Section End -->
    @endif

</x-app-layout>