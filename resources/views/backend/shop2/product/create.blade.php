@extends('layouts.admin')
@section('content')
<a href="{{ url()->previous() }}">
    <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
</a>
<div class="add_food_iten_box">
    <h2>{{ $title }}</h2>
    <form id="uploadForm" action="{{ isset($item) ? route('admin.product.store', $item->id) : route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-admin.input type="text" title="name" placeholder="Name" :value="isset($item) ? $item->name : ''" />
        @error('name')
        <x-admin.input-error :message="$message" />
        @enderror

        <x-admin.select title="category_id" :data="$categories" :value="isset($item) ? $item->category_id : ''" />
        @error('category_id')
        <x-admin.input-error :message="$message" />
        @enderror

        <x-admin.input type="text" title="price" placeholder="Sale Price" :value="isset($item) ? $item->price : ''" />
        @error('price')
        <x-admin.input-error :message="$message" />
        @enderror

        <x-admin.input type="text" title="regular_price" placeholder="Regular Price" :value="isset($item) ? $item->regular_price : ''" />
        @error('regular_price')
        <x-admin.input-error :message="$message" />
        @enderror

        <x-admin.input type="text" title="off" placeholder="Off" :value="isset($item) ? $item->off : ''" />
        @error('off')
        <x-admin.input-error :message="$message" />
        @enderror


        <x-admin.textarea title="description" placeholder="Description" :value="isset($item) ? $item->description : ''" />
        @error('description')
        <x-admin.input-error :message="$message" />
        @enderror


        <x-admin.file title="image" :value="isset($item) ? getFileUrl($item->image) : ''" />
        @error('image')
        <x-admin.input-error :message="$message" />
        @enderror


        <div class="form-group">
            <div class=" select-box mb-3">
                <select class="select-multi" name="colors[]" id="colors" multiple>
                    @foreach($colors as $color)
                    <option value="{{ $color->id }}" {{ isset($item)? $item->getColor($color->id) ? 'selected': '' : ''}}>{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('name')
            <x-admin.input-error :message="$message" />
            @enderror
        </div>



        <x-admin.input type="text" title="image_alt" placeholder="Image Alt" :value="isset($item) ? $item->image_alt : ''" />
        @error('image_alt')
        <x-admin.input-error :message="$message" />
        @enderror

        <button type="submit">Submit</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    $('.select-multi').select2({
        placeholder: "Select Colors",
    });

    $('#regular_price').blur(function() {
        let sale_price = $('#price').val();
        let regular_price = $('#regular_price').val();

        let differ = parseFloat(regular_price) - parseFloat(sale_price);
        let off = (differ * 100) / parseFloat(regular_price);
        $('#off').val(Math.ceil(off));
        console.log(off)
    })
</script>
@endpush