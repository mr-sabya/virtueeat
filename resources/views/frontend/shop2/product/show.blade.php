@extends('layouts.merchant')

@section('body')
<section class="shop_product">
    <div class="container-fulid">
        <div class="shop_title_box">
            <h1>Virtue Store</h1>
            <h1>({{$total_products}}) Products</h1>
        </div>

        @include('frontend/shop2/partials/search')

        <div class="produt_details_box">
            @if(Session::has('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hi {{ Auth::user()->name }}!</strong> {{ Session::get('message')}}.
                <a href="#" class="link">Go to Cart <i class="flaticon-shopping-card"></i></a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="row">
                <div class="col-xl-6 col-lg-12 col-sm-12">
                    <div class="bxslider">
                        <div class="slider-content">
                            <div class="slider-pager">
                                <ul class="thumb-box">
                                    <li>
                                        <a class="active" data-slide-index="0" href="#">
                                            <figure><img src="{{ getFileUrl($product->image) }}" alt=""></figure>
                                        </a>
                                    </li>

                                    @if($product->images->count()>0)
                                    @foreach($product->images as $image)
                                    <li>
                                        <a data-slide-index="{{ $loop->index + 1 }}" href="#">
                                            <figure><img src="{{ getFileUrl($image->image) }}" alt=""></figure>
                                        </a>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="product-image">
                                <a href="{{ getFileUrl($product->image) }}" class="lightbox-image" data-fancybox="gallery">
                                    <img src="{{ getFileUrl($product->image) }}" alt="Product Image">
                                </a>
                            </div>
                        </div>

                        @if($product->images->count()>0)
                        @foreach($product->images as $slide_image)
                        <div class="slider-content">
                            <div class="slider-pager">
                                <ul class="thumb-box">
                                    <li>
                                        <a data-slide-index="0" href="#">
                                            <figure><img src="{{ getFileUrl($product->image) }}" alt=""></figure>
                                        </a>
                                    </li>

                                    @if($product->images->count()>0)
                                    @foreach($product->images as $image)
                                    <li>
                                        <a class="{{ $slide_image->id == $image->is ? 'active' : ''}}" data-slide-index="{{ $loop->index + 1 }}" href="#">
                                            <figure><img src="{{ getFileUrl($image->image) }}" alt=""></figure>
                                        </a>
                                    </li>
                                    @endforeach
                                    @endif

                                </ul>
                            </div>
                            <div class="product-image">
                                <a href="{{ getFileUrl($slide_image->image)}}" class="lightbox-image" data-fancybox="gallery">
                                    <img src="{{ getFileUrl($slide_image->image)}}" alt="Product Image">
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-sm-12">
                    <div class="product_details_info">
                        <div class="product_price">$19.99</div>
                        <h3 class="product_name"><a href="#">{{ $product->name }}</a></h3>
                        <p class="product_description">{{ $product->description }}</p>
                        <form action="{{ route('shop.cart.add', $product->id)}}" id="cart_form">
                            <input type="hidden" id="page" name="page" value="product">
                            <div class="color-selector">
                                <input type="hidden" id="color_input" name="color">
                                @foreach($product->colors as $color)
                                <button type="button" class="color-option color" data-id="{{ $color->id }}" data-value="{{ $color->id }}" style="background-color: {{ $color->color_code }};"></button>
                                @endforeach

                            </div>
                            <div class="product_cart_box">
                                <div class="product-quantity">
                                    <a href="javascript:void(0)" class="cart-btn show-page plus-btn" id="plus_btn"><i class="fa-solid fa-plus"></i></a>
                                    <a href="javascript:void(0)" class="cart-btn show-page minus-btn" id="minus_btn"><i class="fa-solid fa-minus"></i></a>
                                    <input class="quantity-spinner" type="text" value="1" name="quantity" id="quantity" readonly>
                                </div>
                                <div class="add_to_cart_btn"><button type="submit">Go to Checkout <i class="flaticon-credit-card"></i></button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="more_product_item">
            <h1>More Products</h1>
            <div class="shop_product_box">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                        <div class="shoping_item">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $(document).on('click', '.color', function() {
        $('.active').removeClass('active');
        let id = $(this).attr('data-id');
        let value = $(this).attr('data-value');
        $('#color_input').val(value);
        $(this).addClass('active')

        console.log('ok');
    });

    $('#plus_btn').click(function() {
        $('#quantity').val(parseInt($('#quantity').val()) + 1);
    })
    $('#minus_btn').click(function() {

        let val = parseInt($('#quantity').val());
        if (val > 1) {
            $('#quantity').val(val - 1);

        }
    })
</script>
@endsection