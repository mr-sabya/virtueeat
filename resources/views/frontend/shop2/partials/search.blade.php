<div class="product_search_form">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <form action="{{ route('shop.product.search')}}">
                <div class="form-group">
                    <div class="search_icon"><i class="flaticon-search"></i></div>
                    <input type="search" class="form-control" placeholder="Search For Product" required name="search">
                    <button type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
            <form id="filter_form">
                <div class="select-box">
                    <div class="filter_icon"><i class="flaticon-filter-1"></i></div>
                    <select class="wide" id="filter" name="filter">
                        <option data-display="Filter">Filter</option>
                        <option value="default">Default</option>
                        <option value="low_to_high">Low to High</option>
                        <option value="high_to_low">High to Low</option>
                    </select>
                </div>

                @if(isset($_GET['search']))
                <input type="hidden" value="{{ $_GET['search'] }}" name="search">
                @endif
            </form>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <a class="cart-box" href="{{ route('shop.cart.index') }}">
                <div class="shoping_icon"><i class="flaticon-shopping-card"></i></div>
                Shopping Cart ({{ $cart_items->count()}})
                <!-- <button>Shopping Cart (04)</button> -->
                <!-- <select class="wide">
                            <option data-display="Shopping Cart (04)"></option>
                            <option value="1">xxxx</option>
                            <option value="2">xxxx</option>
                            <option value="3">xxxx</option>
                        </select> -->
            </a>
        </div>
    </div>
</div>