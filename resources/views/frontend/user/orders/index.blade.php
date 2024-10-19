<x-app-layout>

    <!-- Search Section -->
    <div class="completed_menu_page">
        <div class="container">
            <div class="completed_outer_box outer_box">
                <h3 class="completed_title">Orders</h3>

                @foreach($orders as $order)
                @if($order->items->count() > 0)
                <div class="completed_item_box">
                    <div class="title_box">
                        <h6>{{ $order->shop['company_name'] }}</h6>
                        <div class="rate">${{ $order->total }}</div>
                    </div>
                    <span>{{ date('l, d F, y', strtotime($order->created_at)) }} • {{ date('h:m a', strtotime($order->created_at)) }}</span>
                    <p>
                        @foreach($order->items as $item)
                        {{ $item->menuItem['name'] }}
                        {{ !$loop->last ? '+' : ''}}
                        @endforeach
                    </p>
                    <p>Status : {{ $order->status['name'] }}</p>
                    <div class="btn_box">
                        <a href="#">Reorder</a>
                        <a href="#">View Receipt</a>
                        <a href="{{ route('user.order.show', $order->id) }}">Show Order</a>
                    </div>
                </div>
                @endif
                @endforeach

            </div>
        </div>
    </div>
    <!-- Search Section End -->

</x-app-layout>