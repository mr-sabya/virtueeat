<x-app-layout>
    @include('partials.frontend.search-bar')
    <!-- Search Section -->
    <div class="cart ">
        <div class="container">
            <div class="row justify-content-center m-5">
                <div class="col-lg-6">
                    @include('partials.frontend.cart-box')
                </div>
            </div>

        </div>
    </div>
    <!-- Search Section End -->


    @section('scripts')
    @include('partials.frontend.cart-script')
    @endsection

</x-app-layout>