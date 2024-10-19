@extends('layouts.admin')
@section('content')
<div class="text_info_title_box style_2">
    <h1 class="sec_title">Permission</h1>
    <div class="info_right_side_box">
        <form class="food_search_form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-button">
                <button class="search_btn" type="submit" id="search-button"><i class="flaticon-loupe"></i></button>
            </div>
        </form>
        <a href="{{ route('admin.permission.create') }}">
            <div class="add_new_food_item">
                <div class="add_btn">Add New Permission <i class="flaticon-plus"></i></div>
            </div>
        </a>
    </div>
</div>
<div class="foods_menu_box">
    <div class="row">
        <div class="col-lg-12">
            <div class="food_item_right table-responsive d-block">
                <table id="permission_table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th width="40%">Name</th>
                            <th width="30%">Permissions</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->group_name }}</td>
                            <td>
                                <a href="{{ route('admin.permission.edit', $permission->id)}}" class="btn_box"><i class="fa-solid fa-pen"></i></a>
                                <button type="button" id="{!! $permission->id !!}" class="delete btn waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush