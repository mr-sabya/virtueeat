@extends('merchant.layouts.app')
@section('content')
<div class="text_info_title_box style_2">
    <h1 class="sec_title">{{ $title }}</h1>
    <div class="info_right_side_box">
        <form class="food_search_form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-button">
                <button class="search_btn" type="submit" id="search-button"><i class="flaticon-loupe"></i></button>
            </div>
        </form>

        <a href="{{ route('merchant.itemcategory.create') }}">
            <div class="add_new_food_item">
                <div class="add_btn">Add New {{ $title }} <i class="flaticon-plus"></i></div>
            </div>
        </a>
    </div>
</div>
<div class="foods_menu_box">
    <div class="row">
        @foreach ($items as $item)
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="food_menu_item">
                <div class="food_item_left">
                    <div class="food_image d-flex justify-content-center align-items-center">
                        @if ($item->thumbnail)
                        <div class="food_image overflow-hidden rounded-circle">
                            <img class="w-100" src="{{ getFileUrl($item->thumbnail) }}" alt="Thumbnail">
                        </div>
                        @else
                        <i class="flaticon-globe fs-3"></i>
                        @endif
                    </div>
                    <div class="food_info">
                        <h5 class="food_name">{{ $item->name }}</h5>
                    </div>
                </div>
               
                <div class="food_item_right">
                    <a href="{{ route('merchant.itemcategory.edit', $item->id) }}">
                        <div class="edit_btn btn_box">
                            <img src="{{ url('assets/backend/images/icons/edit_btn.png') }}" alt="">
                        </div>
                    </a>
                    <form action="{{ route('merchant.itemcategory.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <div class="delete_btn btn_box">
                                <img src="{{ url('assets/backend/images/icons/delete_btn.png') }}" alt="">
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>

@endsection