@extends('layouts.admin')
@section('content')
<div class="text_info_title_box style_2">
    <h1 class="sec_title">Roles</h1>
    <div class="info_right_side_box">
        <form class="food_search_form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-button">
                <button class="search_btn" type="submit" id="search-button"><i class="flaticon-loupe"></i></button>
            </div>
        </form>
        <a href="{{ route('admin.role.create') }}">
            <div class="add_new_food_item">
                <div class="add_btn">Add New Role <i class="flaticon-plus"></i></div>
            </div>
        </a>
    </div>
</div>
<div class="foods_menu_box">
    <div class="row">
        <div class="col-lg-12">
            <div class="food_item_right table-responsive d-block">
                <table class="table table-bordered data-table bg-white w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th width="105px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>@foreach ($role->permissions as $permission)
                                <span class="badge bg-info mr-1">
                                    {{ $permission->name }}
                                </span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('admin.role.edit', $role->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush