@extends('layouts.merchant')

@section('body')
<section class="shop_product">
    <div class="container-fulid">
        <div class="shop_title_box">
            <h1>Virtue Store</h1>
            <h1>({{$total_products}}) Products</h1>
        </div>

        @include('frontend/shop2/partials/search')

        <div class="shop_product_box">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hi {{ Auth::user()->name }}!</strong> {{ Session::get('success')}}.
                <a href="#" class="link">Go to Cart <i class="flaticon-shopping-card"></i></a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="shoping_item p-4">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 ">
                                <div class="produt_block_one">
                                    @if($product->off != 0)
                                    <div class="discount_tag">-{{ $product->off }}%</div>
                                    @endif
                                    @if($product->category)
                                    <div class="product_block_tag">{{ $product->category['name']}}</div>
                                    @else
                                    <div class="product_block_tag" style="margin-bottom: 40px;"></div>
                                    @endif
                                    <h6 class="product_name"><a href="{{ route('shop.product.show', $product->slug)}}">{{ $product->name }}</a></h6>
                                    <div class="product_image">
                                        <img src="{{ getFileUrl($product->image) }}" alt="">
                                    </div>
                                    <div class="product_price_box">
                                        <div class="product_price">${{ $product->price }} <span>${{ $product->regular_price }}</span></div>
                                        <div class="product_cart"><a href="{{ route('shop.cart.add', $product->id)}}"><i class="flaticon-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                        {{ $products->links() }}
                    </div>
                </div>

                <!-- cart -->
                @include('frontend.shop2.partials.cart')
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $(document).on('click', '.plus', function() {
        let id = $(this).attr('data-id');
        let input = $('#quantity_' + id);

        $.ajax({
            type: "GET",
            url: "/shop/cart-item/update/" + id + "?req=increment",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                input.val(response.cart_item.quantity);
                $('#product_rate_' + id).html(response.total_price)
                $('#total').html(response.cart_total)
            }
        });
    });
    $(document).on('click', '.minus', function() {
        let id = $(this).attr('data-id');
        let input = $('#quantity_' + id);

        $.ajax({
            type: "GET",
            url: "/shop/cart-item/update/" + id + "?req=decrement",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                input.val(response.cart_item.quantity);
                $('#product_rate_' + id).html(response.total_price)
                $('#total').html(response.cart_total)
            }
        });
    });

    $('#filter').change(function() {
        $('#filter_form').submit();
    })
</script>
@endsection