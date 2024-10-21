@extends('backend.layouts.app')

@section('title')
{{ isset($item) ? 'Edit' : 'Add' }} Country
@endsection

@section('content')
<a href="{{ url()->previous() }}">
    <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
</a>

<div class="row">
    <div class="col-lg-6">
        <div class="add_food_iten_box">
            <h2>{{ $title }}</h2>
            <form id="uploadForm" action="{{ isset($item) ? route('admin.country.store', $item->id):route('admin.country.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-admin.input type="text" title="name" placeholder="Name" :value="isset($item) ?$item->name:''" />
                @error('name')
                <x-admin.input-error :message="$message" />
                @enderror

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection