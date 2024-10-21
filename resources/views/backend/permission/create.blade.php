@extends('backend.layouts.app')

@section('title')
{{ isset($item) ? 'Edit' : 'Add' }} Permission
@endsection

@section('content')
<a href="{{ url()->previous() }}">
    <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
</a>
<div class="add_food_iten_box">
    <h2>Add New permission</h2>
    <form action="{{ route('admin.permission.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-lg-10">
                <div class="form-group">
                    <label for="group_name">Group Name</label>
                    <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter a Group Name">
                    @if ($errors->has('group_name'))
                    <span id="slug_error" style="color: red">{{ $errors->first('group_name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <button class="btn btn-success btn-form m-0" type="button" id="add_button"><i class="flaticon-plus"></i> Add</button>
                </div>
            </div>
        </div>


        <div class="table-responsive">
            <table id="permission_table" class="table table-bordered dynamic-table">
                <thead>
                    <tr>
                        <th>Permission Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>


        <div id="uploadForm">
            <button type="submit">Submit</button>
        </div>

    </form>
</div>
@endsection

@push('scripts')

<script>
    var i = 0;

    $("#add_button").click(function() {

        ++i;

        $("#permission_table tbody").append('<tr><td><input type="text" name="name[]" placeholder="Permission Name" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>

@endpush