@extends('merchant.layouts.app')
@section('content')
<a href="{{ url()->previous() }}">
    <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
</a>


<div class="row mt-3">
    <div class="col-lg-6">
        <form id="uploadForm" action="{{ route('merchant.restaurant.update') }}" method="post" enctype="multipart/form-data">

            <h3>Business Info</h3>
            <div class="mt-3">
                @csrf

                <input type="hidden" name="id" value="{{ $account->id }}">

                <x-admin.input type="text" label="Phone" title="phone" :value="$account->phone" />
                @error('phone')
                <x-admin.input-error :message="$message" />
                @enderror

                <x-admin.input type="text" label="Email" title="email" :value="$account->email" />
                @error('email')
                <x-admin.input-error :message="$message" />
                @enderror

                <x-admin.input type="color" label="Color" title="color" :value="$account->color" />
                @error('color')
                <x-admin.input-error :message="$message" />
                @enderror

                <x-admin.input type="text" label="Font" title="font" :value="$account->font" />
                @error('font')
                <x-admin.input-error :message="$message" />
                @enderror

                <x-admin.input type="text" label="Delivery Time" title="delivery_time" :value="$account->delivery_time" placeholder="20-30 min" />
                @error('font')
                <x-admin.input-error :message="$message" />
                @enderror

                <x-admin.input type="text" label="Delivery Charge" title="delivery_charge" :value="$account->delivery_charge" />
                @error('font')
                <x-admin.input-error :message="$message" />
                @enderror


                <label for="">Logo</label>
                <x-admin.file title="logo" :value="getFileUrl($account->logo)" />
                @error('logo')
                <x-admin.input-error :message="$message" />
                @enderror

                <label for="">Banner</label>
                <div class="form-group image_upload_box">
                    <h6>Upload Image</h6>
                    <label for="image-upload-banner" class="custom-file-upload">
                        @if($account->banner != '')
                        <img src="{{ getFileUrl($account->banner) }}" alt="upload" id="output_banner">
                        @else
                        <img src="{{ url('assets/backend/images/icons/icon_19.png') }}" alt="upload" id="output_banner">
                        @endif
                    </label>
                    <input type="file" id="image-upload-banner" name="banner" onchange="loadFileBanner(event)">
                </div>

                @error('banner')
                <x-admin.input-error :message="$message" />
                @enderror



                <label for="">Location</label>
                <div class="form-group">
                    <div class="form-switcher select-box mb-3">
                        <select class="wide" id="location_id" name="location_id">
                            <option value="" selected disabled>-- Select --</option>
                            @foreach ($locations as $location)
                            <option value="{{ $location->id }}" {{ $location->id == $account->location_id ? 'selected' : '' }}>
                                {{ $location->city }}, {{ $location->region }}, {{ $location->country }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="add_extras_box mt-4">
                    <h2>Location</h2>
                    <a class="add_drinks_btn" href="{{ route('merchant.location', $account->id) }}">Get My Location <i class="flaticon-plus"></i></a>
                </div>


            </div>

            <button class="mb-3 mt-3" type="submit">Save</button>
        </form>
    </div>

</div>

<div class="mt-5"></div>


@endsection
@push('scripts')
<script>
    var loadFileBanner = function(event) {
        var reader2 = new FileReader();
        reader2.onload = function() {
            var output2 = document.getElementById('output_banner');
            output2.src = reader2.result;
        };
        reader2.readAsDataURL(event.target.files[0]);

        console.log('ok')
    };

</script>
@endpush