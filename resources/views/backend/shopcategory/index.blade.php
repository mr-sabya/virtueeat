@extends('backend.layouts.app')

@section('title', 'Shop Categories')

@section('content')
    <x-admin.index title="ShopCategory" :items="$items" />
@endsection
