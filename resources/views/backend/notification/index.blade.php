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
                            <th>Notification</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notifications as $notification)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>
                                @if($notification->data['role'] == 'make_order')
                                @php
                                $user = App\Models\User::where('id', $notification->data['data']['user_id'])->first();
                                $order = App\Models\Order::where('id', $notification->data['data']['order_id'])->first();
                                @endphp
                                <!-- {{ $notification->data['data']['order_id'] }} -->
                                @if($notification->data['role'] == 'make_order')
                                New Order by {{ $user->first_name == '' ? $user->email : $user->first_name.' '.$user->last_name }} <br>
                                @endif

                                @foreach($order->items as $item)
                                {{ $item->menuItem['name']}} 
                                {{ !$loop->last ? '+' : ''}}
                                @endforeach
                                @elseif($notification->data['role'] == 'register')
                                @if($notification->data['data']['user_type'] == 'user')
                                New User Regiser Now
                                @endif
                                @endif
                                
                            </td>
                            <td>
                                @if($notification->read_at == NULL)
                                Unread
                                @else
                                Read
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.notification.show', $notification->id) }}" class="btn_box">Show Notification</a>
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
<script>
    var table = $('.data-table').DataTable({});
</script>
@endpush