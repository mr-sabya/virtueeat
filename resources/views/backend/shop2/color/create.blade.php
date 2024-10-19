@extends('layouts.admin')
@section('content')
    <a href="{{ url()->previous() }}">
        <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
    </a>
    <div class="add_food_iten_box">
        <h2>{{ $title }}</h2>
        <form id="uploadForm"
            action="{{ isset($item) ? route('admin.productcolor.store', $item->id) : route('admin.productcolor.store') }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input type="text" title="name" placeholder="Name" :value="isset($item) ? $item->name : ''" />
            @error('name')
                <x-admin.input-error :message="$message" />
            @enderror

            
            <x-admin.input type="color" title="color_code" placeholder="Product Color" :value="isset($item) ? $item->color_code : ''" />
            @error('color_code')
                <x-admin.input-error :message="$message" />
            @enderror

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
