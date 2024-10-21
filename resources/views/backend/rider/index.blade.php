@extends('backend.layouts.app')

@section('title', 'Riders')

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
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Occupation</th>
                            <th>Restaurant</th>
                            <th>Commission</th>
                            <th>Total Order</th>
                            <th>Revevue</th>
                            <th>License Number</th>
                            <th>Active Order</th>
                            <th>Status</th>
                            <th width="105px">Action</th>
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
            ajax: "{{ route('admin.rider.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },

                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'occupation',
                    name: 'occupation'
                },
                {
                    data: 'restaurant',
                    name: 'restaurant'
                },
                {
                    data: 'commission',
                    name: 'commission'
                },
                {
                    data: 'total_order',
                    name: 'total_order'
                },
                {
                    data: 'revenue',
                    name: 'revenue'
                },
                {
                    data: 'lisence',
                    name: 'lisence'
                },
                {
                    data: 'activer_order',
                    name: 'activer_order'
                },
                {
                    data: 'status',
                    name: 'status'
                },
               
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },

            ]
        });

    });
</script>
@endpush