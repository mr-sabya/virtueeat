<x-app-layout>

    @include('partials.frontend.search-bar')

    <!--Product Order Page -->
    <section class="product_order_page">
        <div class="container">
            <a href="{{ route('main.shop.show', $shop->id)}}?category={{ $shop->category['slug'] }}" class="back_to_product_btn"><i class="icon-arrow-left"></i> Back to {{ $shop->company_name }}</a>
            <div class="product_outer_box">
                <div class="product_image_box" style="overflow: hidden;">
                    @if($menuItem->thumbnail == '')
                    <img src="{{ url('assets/frontend/images/gallery.png') }}" alt="">
                    @else
                    <img src="{{ getFileUrl($menuItem->thumbnail) }}" alt="">
                    @endif
                </div>
                <div class="product_info_box">
                    <h3 class="product_title">{{ $menuItem->name }}</h3>
                    <span class="product_price">${{ $menuItem->price }}</span>
                    <p>{{ $menuItem->description }}</p>
                    <div class="product_like_btn"><i class="icon-like"></i>89% (50)</div>
                    <div class="border_bottom"></div>
                    <form action="{{ route('main.cart.add', $shop->id)}}" method="post">
                        @csrf
                        <div class="instructions_form">
                            <label for="instructions">Special Instructions</label>
                            <textarea id="instructions" name="instruction" placeholder="Add a note"></textarea>
                            <span>You may be charged for extras.</span>
                        </div>
                        <div class="quantity_outer_box">
                            <div class="item-quantity">
                                <a href="javascript:void(0)" class="quantity plus"><i class="fa-solid fa-plus"></i></a>
                                <a href="javascript:void(0)" class="quantity minus"><i class="fa-solid fa-minus"></i></a>
                                <input class="quantity-spinner" type="text" value="1" name="quantity" id="quantity">
                            </div>

                            <input type="hidden" name="menu_item_id" id="menu_item_id" value="{{ $menuItem->id }}">
                            <input type="hidden" name="price" id="price" value="{{ $menuItem->price }}">
                            <input type="hidden" id="get_total_price" value="{{ $menuItem->price }}">
                            @auth
                            <div class="go_to_checkout">
                                <button type="submit" class="theme-btn-two" style="height: auto;">Add to Cart • $<span id="total_price">{{ $menuItem->price }}</span></button>
                            </div>
                            @else
                            <div class="go_to_checkout">
                                <a href="{{ route('login')}}?redirect=/shop/{{ $menuItem->shop['id'] }}/item/{{ $menuItem->id }}?category={{ $menuItem->category['slug'] }}" class="theme-btn-two" style="height: auto;">Add to Cart • $<span id="total_price">{{ $menuItem->price }}</span></a>
                            </div>
                            @endauth
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Product Order Page End -->

    <!-- Suggest Product -->
    <section class="suggest_product">
        <div class="container">
            <h3 class="section_title">Frequently bought together</h3>
            <div class="row">

                @foreach($menuItems as $item)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="suggest_product_block">
                        <div class="product_content">
                            <h6 class="product_name"><a href="{{ route('main.item.show', [$shop->id, $item->id])}}?category={{ $item->category['slug'] }}">Mozzarella Sticks (6 pcs)</a></h6>
                            <span class="product_rate">${{ $item->price }}</span>
                            <div class="custom-controls-stacked">
                                <label class="custom-control material-checkbox">
                                    <span class="description" style="font-weight: normal; margin-left: 0; font-size: 12px; line-height: normal;">
                                        {{ $item->description }}
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="product_image">
                            <a href="{{ route('main.item.show', [$shop->id, $item->id])}}?category={{ $item->category['slug'] }}" class="link_btn">
                                @if($item->thumbnail == '')
                                <img src="{{ url('assets/frontend/images/gallery.png') }}" alt="">
                                @else
                                <img src="{{ getFileUrl($item->thumbnail) }}" alt="">
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Suggest Product End -->

    @section('scripts')
    @if(isset($cart))
    @include('partials.frontend.cart-script')
    @endif
    <script>
        $(document).on('click', '.plus', function() {
            let input = $('#quantity');

            var old_qunatity = input.val();
            var new_quantity = parseInt(old_qunatity) + 1;

            let price = $('#price').val();

            let total_price = $('#get_total_price').val();

            let update_price = parseFloat(total_price) + parseFloat(price);

            $('#total_price').html(parseFloat(update_price).toFixed(2));
            $('#get_total_price').val(parseFloat(update_price).toFixed(2));

            input.val(new_quantity);

        });
        $(document).on('click', '.minus', function() {
            let input = $('#quantity');

            var old_qunatity = input.val();


            if (parseInt(old_qunatity) > 1) {
                var new_quantity = parseInt(old_qunatity) - 1;

                let price = $('#price').val();

                let total_price = $('#get_total_price').val();

                let update_price = parseFloat(total_price) - parseFloat(price);

                $('#total_price').html(parseFloat(update_price).toFixed(2));
                $('#get_total_price').val(parseFloat(update_price).toFixed(2));


                input.val(new_quantity);
            }



        });
    </script>
    @endsection

</x-app-layout>