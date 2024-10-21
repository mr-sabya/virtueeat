@extends('backend.layouts.app')

@section('title')
{{ isset($item) ? 'Edit' : 'Add' }} Product Image
@endsection

@section('content')
<a href="{{ url()->previous() }}">
    <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
</a>
<div class="add_food_iten_box">
    <h2>{{ $title }}</h2>
    <form id="uploadForm" action="{{ isset($item) ? route('admin.productimage.store', $item->id) : route('admin.productimage.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        @if(isset($product))
        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
        @else
        <input type="hidden" name="product_id" id="product_id" value="{{ $item->product_id }}">
        @endif
        
        <x-admin.input type="text" title="name" placeholder="Name" :value="isset($item) ? $item->name : ''" />
        @error('name')
        <x-admin.input-error :message="$message" />
        @enderror


        <x-admin.file title="image" :value="isset($item) ? getFileUrl($item->image) : ''" />
        @error('image')
        <x-admin.input-error :message="$message" />
        @enderror


        <x-admin.input type="text" title="image_alt" placeholder="Image Alt" :value="isset($item) ? $item->image_alt : ''" />
        @error('image_alt')
        <x-admin.input-error :message="$message" />
        @enderror

        <button type="submit">Submit</button>
    </form>
</div>
@endsection

@push('scripts')

@endpush