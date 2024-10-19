<div class="col-lg-6 col-md-6 col-sm-12">
    <div class="food_menu_item">
        <div class="food_item_left">
            <div class="food_image d-flex justify-content-center align-items-center">
                @if ($item->thumbnail)
                <div class="food_image overflow-hidden rounded-circle">
                    <img class="w-100" src="{{ getFileUrl($item->thumbnail) }}" alt="Thumbnail">
                </div>
                @elseif ($item->icon)
                <div class="food_image overflow-hidden rounded-circle">
                    <img class="w-100" src="{{ getFileUrl($item->icon) }}" alt="Thumbnail">
                </div>
                @else
                <i class="flaticon-globe fs-3"></i>
                @endif
            </div>
            <div class="food_info">
                <h5 class="food_name">{{ $item->name }}</h5>
            </div>
        </div>
        @php
        $name = ($route ?? 'admin.') . strtolower($title);
        @endphp
        <div class="food_item_right">
            <a href="{{ route($name . '.edit', $item->id) }}">
                <div class="edit_btn btn_box">
                    <img src="{{ url('assets/backend/images/icons/edit_btn.png') }}" alt="">
                </div>
            </a>
            <form action="{{ route($name . '.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <div class="delete_btn btn_box">
                        <img src="{{ url('assets/backend/images/icons/delete_btn.png') }}" alt="">
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>