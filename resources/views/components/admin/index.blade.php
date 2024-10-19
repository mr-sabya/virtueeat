<div class="text_info_title_box style_2">
    <h1 class="sec_title">{{ $title }}</h1>
    <div class="info_right_side_box">
        <form class="food_search_form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search"
                    aria-describedby="search-button">
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
        @foreach ($items as $item)
            <x-admin.item-card :item="$item" :title="$title" />
        @endforeach
    </div>
</div>