@extends('merchant.layouts.app')
@section('content')
<a href="{{ url()->previous() }}">
    <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
</a>
<form id="uploadForm" action="{{ isset($item) ? route('merchant.menuitem.store', $item->id) : route('merchant.menuitem.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="add_food_iten_box">
        <h2>Add {{ __('Menu Item') }}</h2>
        <!-- <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach.
            </ul>
        </div> -->
        <x-admin.input type="text" title="name" placeholder="Name" :value="isset($item) ? $item->name : ''" />
        @error('name')
        <x-admin.input-error :message="$message" />
        @enderror

        <x-admin.input type="text" title="price" placeholder="$price" :value="isset($item) ? $item->price : ''" />
        @error('price')
        <x-admin.input-error :message="$message" />
        @enderror

        <div class="form-group mb-3">
            <textarea class="w-100" name="description" id="description" cols="30" rows="10" placeholder="Enter Menu Description">{{ isset($item) ? $item->description : '' }}</textarea>
            @error('description')
            <x-admin.input-error :message="$message" />
            @enderror
        </div>

        <x-admin.file title="thumbnail" :value="isset($item) ? getFileUrl($item->thumbnail) : ''" />
        @error('thumbnail')
        <x-admin.input-error :message="$message" />
        @enderror

        <div>
            <label for="">Category</label>
            <x-admin.select class="mb-3" title="category_id" :data="$categories" :value="isset($item) ? $item->category_id : ''" />
            @error('category_id')
            <x-admin.input-error :message="$message" />
            @enderror
        </div>

        <label for="">Item Category</label>
        <div class="form-group">
            <div class=" select-box mb-3">
                <select class="select-multi" name="item_category[]" id="item_category" multiple>
                    @foreach($item_categories as $item_category)
                    <option value="{{ $item_category->id }}" {{ isset($item)? $item->getItemCategory($item_category->id) ? 'selected': '' : ''}}>{{ $item_category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('item_category')
            <x-admin.input-error :message="$message" />
            @enderror
        </div>


        <div>
            <label for="">Dietary</label>
            <x-admin.select class="mb-3" title="dietary_id" :data="$dietaries" :value="isset($item) ? $item->dietary_id : ''" />
            @error('dietary_id')
            <x-admin.input-error :message="$message" />
            @enderror
        </div>

        <x-admin.input type="text" label="Delivery Time" title="delivery_time" placeholder="i.e. 25-40 min" :value="isset($item) ? $item->delivery_time : ''" />
        @error('delivery_time')
        <x-admin.input-error :message="$message" />
        @enderror


    </div>


    <button class="mb-3" type="submit">Submit</button>
</form>

@endsection
@push('scripts')
<script>
    $('.select-multi').select2({
        placeholder: "Select Item Categories",
    });
</script>
@endpush