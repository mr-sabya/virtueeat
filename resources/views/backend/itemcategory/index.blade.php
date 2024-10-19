@extends('layouts.admin')
@section('content')
    <x-admin.index title="ItemCategory" :items="$items" />
    {{ $items->links() }}
@endsection
