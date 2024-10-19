@extends('layouts.admin')
@section('content')
<div class="text_info_title_box style_2">
    <h1 class="sec_title">{{ $title }}</h1>
    <div class="info_right_side_box">
        <form class="food_search_form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-button">
                <button class="search_btn" type="submit" id="search-button"><i class="flaticon-loupe"></i></button>
            </div>
        </form>
        @php
        $name = 'admin.'.strtolower($title).'.create';
        @endphp
        <a href="{{ route($name) }}">
            <div class="add_new_food_item">
                <div class="add_btn">Add New {{ $title }} <i class="flaticon-plus"></i></div>
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
                            <th>Image</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Regular Price</th>
                            <th>Off(%)</th>
                            <th>Colors</th>
                            <th width="105px">Action</th>
                            <th width="105px">Extra Image</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.product.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'productimage',
                    name: 'productimage'
                },
                {
                    data: 'name',
                    name: 'name'
                },

                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'regular_price',
                    name: 'regular_price'
                },
                {
                    data: 'off',
                    name: 'off'
                },
                {
                    data: 'productcolors',
                    name: 'productcolors'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'addimage',
                    name: 'addimage',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });
</script>
@endpush