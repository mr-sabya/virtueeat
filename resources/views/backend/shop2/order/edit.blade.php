@extends('backend.layouts.app')

@section('title', 'Edit Order')

@section('content')
<a href="{{ url()->previous() }}">
    <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
</a>
<div class="add_food_iten_box">
    <h2>{{ $title }}</h2>
    <form id="uploadForm" action="{{ route('admin.order.update', $order->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="form-group">
            <div class="form-switcher select-box mb-3">
                <select class="wide" id="status }}" name="status">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                </select>
            </div>
        </div>

        @error('status')
        <x-admin.input-error :message="$message" />
        @enderror

        <button type="submit">Submit</button>
    </form>
</div>
@endsection