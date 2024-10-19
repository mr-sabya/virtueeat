@extends('layouts.admin')
@section('content')
<a href="{{ url()->previous() }}">
    <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
</a>
<div class="add_food_iten_box">
    <h2>Add New {{ $title }}</h2>
    <form id="uploadForm" action="{{ isset($item) ? route('admin.subcategory.store', $item->id) : route('admin.subcategory.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <x-admin.select title="category_id" :data="$categories" :value="isset($item) ? $item->category_id : ''" />
        @error('category_id')
        <x-admin.input-error :message="$message" />
        @enderror


        <x-admin.input type="text" title="name" placeholder="Name" :value="isset($item) ? $item->name : ''" />
        @error('name')
        <x-admin.input-error :message="$message" />
        @enderror

        <x-admin.file title="thumbnail" :value="isset($item) ? getFileUrl($item->thumbnail) : ''" />
        @error('thumbnail')
        <x-admin.input-error :message="$message" />
        @enderror

        <button type="submit">Submit</button>
    </form>
</div>
@endsection