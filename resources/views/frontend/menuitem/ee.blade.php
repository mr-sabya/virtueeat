<x-app-layout>

    <form>
        <!--Product Order Page -->
        <section class="product_order_page">
            <div class="container">
                <a href="{{ route('main.shop.show', $shop->id)}}?category={{ $shop->category['slug'] }}" class="back_to_product_btn"><i class="icon-arrow-left"></i> Back to {{ $shop->company_name }}</a>
                <div class="product_outer_box">
                    <div class="product_image_box" style="overflow: hidden;">
                        @if($menuItem->thumbnail == '')
                        <img src="{{ url('assets/frontend/images/gallery.png') }}" alt="">
                        @else
                        <img src="{{ getFileUrl($menuItem->thumbnail) }}" alt="" class="w-100">
                        @endif
                    </div>
                    <div class="product_info_box">
                        <h3 class="product_title">{{ $menuItem->name }}</h3>
                        <span class="product_price">${{ $menuItem->price }}</span>
                        <p>{{ $menuItem->description }}</p>
                        <div class="product_like_btn"><i class="icon-like"></i>89% (50)</div>
                        <div class="border_bottom"></div>
                        <div class="instructions_form">
                            <label for="instructions">Special Instructions</label>
                            <textarea id="instructions" name="instructions_box[]" placeholder="Add a note"></textarea>
                            <span>You may be charged for extras.</span>
                        </div>
                        <div class="quantity_outer_box">
                            <div class="item-quantity">
                                <a href="javascript:void(0)" data-id="{{ $menuItem->id }}" class="quantity plus"><i class="fa-solid fa-plus"></i></a>
                                <a href="javascript:void(0)" data-id="{{ $menuItem->id }}" class="quantity minus"><i class="fa-solid fa-minus"></i></a>
                                <input class="quantity-spinner" type="text" value="1" name="quantity" id="quantity_{{ $menuItem->id }}">
                            </div>
                            <input type="hidden" name="menu_item[]" value="{{ $menuItem->id }}">
                            <input type="hidden" name="price" id="price_{{ $menuItem->id }}" value="{{ $menuItem->price }}">
                            <input type="hidden" id="get_total_price" value="{{ $menuItem->price }}">
                            <div class="go_to_checkout"><button class="theme-btn-two" style="height: auto;">Add to Cart • $<span id="total_price">{{ $menuItem->price }}</span></button></div>
                        </div>
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
                                <h6 class="product_name">Mozzarella Sticks (6 pcs)</h6>
                                <span class="product_rate">${{ $item->price }}</span>
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" id="checkbox1" name="menu_item[]" class="material-control-input extra" data-id="{{ $item->id }}" value="{{ $item->id }}">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">
                                            <div class="item-quantity">
                                                <a href="javascript:void(0)" data-id="{{ $item->id }}" class="quantity plus"><i class="fa-solid fa-plus"></i></a>
                                                <a href="javascript:void(0)" data-id="{{ $item->id }}" class="quantity minus"><i class="fa-solid fa-minus"></i></a>
                                                <input class="quantity-spinner" type="text" value="1" name="quantity[]" id="quantity_{{ $item->id }}">
                                            </div>
                                            <textarea style="display: none;" name="instructions_box[]" placeholder="Add a note"></textarea>
                                            <input type="hidden" name="price" id="price_{{ $item->id }}" value="{{ $item->price }}">
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="product_image">
                                <a href="product-details.html" class="link_btn">
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

    </form>

    @section('scripts')
    <script>
        $(document).on('click', '.plus', function() {
            let data_id = $(this).attr('data-id');
            let input = $('#quantity_' + data_id);


            var old_qunatity = input.val();
            var new_quantity = parseInt(old_qunatity) + 1;

            let price = $('#price_' + data_id).val();

            let total_price = $('#get_total_price').val();

            let update_price = parseFloat(total_price) + parseFloat(price);

            $('#total_price').html(parseFloat(update_price).toFixed(2));
            $('#get_total_price').val(parseFloat(update_price).toFixed(2));

            input.val(new_quantity);

        });
        $(document).on('click', '.minus', function() {
            let data_id = $(this).attr('data-id');
            let input = $('#quantity_' + data_id);


            var old_qunatity = input.val();

            if (parseInt(old_qunatity) > 1) {
                var new_quantity = parseInt(old_qunatity) - 1;


                let price = $('#price_' + data_id).val();

                let total_price = $('#get_total_price').val();

                let update_price = parseFloat(total_price) - parseFloat(price);

                $('#total_price').html(parseFloat(update_price).toFixed(2));
                $('#get_total_price').val(parseFloat(update_price).toFixed(2));


                input.val(new_quantity);
            }



        });

        $(document).on('change', '.extra', function() {
            let data_id = $(this).attr('data-id');
            let total_price = $('#get_total_price').val();

            let price = $('#price_' + data_id).val();
            let update_price;

            if (this.checked) {
                update_price = parseFloat(total_price) + parseFloat(price);
            } else {
                update_price = parseFloat(total_price) - parseFloat(price);
            }

            $('#total_price').html(parseFloat(update_price).toFixed(2));
            $('#get_total_price').val(parseFloat(update_price).toFixed(2));
        });
    </script>
    @endsection

</x-app-layout>