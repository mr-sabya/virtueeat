@extends('backend.layouts.app')

@section('title', 'City')

@section('content')
    <x-admin.index title="City" :items="$items" />
    {{$items->links()}}
@endsection
