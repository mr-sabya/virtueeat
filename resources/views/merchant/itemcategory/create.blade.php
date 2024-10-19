@extends('merchant.layouts.app')
@section('content')
    <a href="{{ url()->previous() }}">
        <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
    </a>
    <div class="add_food_iten_box">
        <h2>Add New {{ $title }}</h2>
        <form id="uploadForm"
            action="{{ isset($item) ? route('merchant.itemcategory.store', $item->id) : route('merchant.itemcategory.store') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="shop_id" value="{{ $shop->id }}">

            <x-admin.input type="text" title="name" placeholder="Name" :value="isset($item) ? $item->name : ''" />
            @error('name')
                <x-admin.input-error :message="$message" />
            @enderror

            <x-admin.file title="icon" :value="isset($item) ? getFileUrl($item->icon) : ''" />
            @error('icon')
                <x-admin.input-error :message="$message" />
            @enderror

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
