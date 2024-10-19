<x-app-layout>

    <livewire:frontend.search.index />


    <livewire:frontend.shop.index id="{{ $id }}" />


    @section('scripts')
    <script>
        $(document).on('click', '.item', function() {
            $('.item').removeClass('active');
            $(this).addClass('active');
        });
    </script>
    @if(isset($cart))
    @include('partials.frontend.cart-script')
    @endif
    @endsection

</x-app-layout>