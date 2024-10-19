<x-app-layout>

    @php
    Request::session()->put('home_url', url()->full());
    @endphp
    <livewire:frontend.search.index />
    <livewire:frontend.feed.index location="{{ $location->id }}" />


    @section('scripts')
    <script>
        $(document).on('click', '.close', function() {
            let data = $(this).attr('data-value');
            $('#' + data + '_button').removeClass('active');
            $('#' + data).removeClass('active show');
        });
    </script>

    <script src="{{ asset('assets/frontend/js/filter-box.js') }}"></script>
    @endsection
</x-app-layout>