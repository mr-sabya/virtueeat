@extends('layouts.admin')
@section('content')
<a href="{{ url()->previous() }}">
    <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
</a>
<div class="add_food_iten_box">
    <h2>Add New Role</h2>
    <form id="" action="{{ isset($item) ? route('admin.role.store', $item->id) : route('admin.role.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <x-admin.input type="text" title="name" placeholder="Name" :value="isset($item) ? $item->name : ''" />
        @error('name')
        <x-admin.input-error :message="$message" />
        @enderror


        <div class="form-group">
            <label for="name">Permissions</label>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                <label class="form-check-label" for="checkPermissionAll">All</label>
            </div>
            <hr>
            @php $i = 1; @endphp
            @foreach ($permission_groups as $group)
            <div class="row">
                @php
                $permissions = App\Models\Admin::getpermissionsByGroupName($group->name);
                $j = 1;
                @endphp

                <div class="col-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                        <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                    </div>
                </div>

                <div class="col-9 role-{{ $i }}-management-checkbox">

                    @foreach ($permissions as $permission)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                        <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                    @php $j++; @endphp
                    @endforeach
                    <br>
                </div>

            </div>
            @php $i++; @endphp
            @endforeach
        </div>


        <div id="uploadForm">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
@include('backend.role.partials.js')

@endpush