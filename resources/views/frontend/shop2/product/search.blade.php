@extends('layouts.merchant')

@section('body')
<section class="shop_product">
    <div class="container-fulid">
        <div class="shop_title_box">
            <h1>Virtue Store</h1>
            <h1>({{$total_products}}) Products</h1>
        </div>

        @include('frontend/shop2/partials/search')


        <div class="more_product_item">
            <h1>Search Result</h1>
            <div class="shop_product_box">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                        <div class="shoping_item pb-4">
                            @if($products->count() > 0)
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
                            @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card mb-5" style="border-radius: 40px;">
                                        <div class="card-body text-center p-5">
                                            <h3>No Items in Cart</h3>
                                            <a href="{{ route('shop.index') }}" class="back_btn">Go to Shop</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- cart -->
                    @include('frontend.shop2.partials.cart')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $('#filter').change(function() {
        $('#filter_form').submit();
    })
</script>
@endsection