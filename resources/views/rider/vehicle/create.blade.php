@extends('rider.layouts.app')
@section('content')
    <a href="{{ url()->previous() }}">
        <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
    </a>
    <div class="add_food_iten_box">
        <h2>Add New {{ $title }}</h2>
        <form id="uploadForm"
            action="{{ isset($item) ? route('rider.vehicle.store', $item->id) : route('rider.vehicle.store') }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @php
                $vehicles = [
                    (object) array('id' => 1, 'name' => 'Motorcycle'),
                    (object) array('id' => 2, 'name' => 'Bicycle'),
                    (object) array('id' => 3, 'name' => 'Vehicle')
                ];
            @endphp
            <p class="fw-bold mb-3 px-2 text-uppercase">Vehicle Type</p>
            <x-admin.select title="vehicle_type" :data="$vehicles" :value="isset($item) ? $item->vehicle_type : ''" />
            @error('vehicle_type')
                <x-admin.input-error :message="$message" />
            @enderror

            <p class="fw-bold mb-3 px-2 text-uppercase">Country</p>
            <x-admin.select title="country_id" :data="$countries" :value="isset($item) ? $item->country_id : ''" />
            @error('country_id')
                <x-admin.input-error :message="$message" />
            @enderror
            {{-- @dd($files) --}}
            

            <button class="mt-4" type="submit">Submit</button>
        </form>
    </div>
@endsection
