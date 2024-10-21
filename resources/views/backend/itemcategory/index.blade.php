@extends('backend.layouts.app')

@section('title', 'Item Categories')

@section('content')
    <x-admin.index title="ItemCategory" :items="$items" />
    {{ $items->links() }}
@endsection
