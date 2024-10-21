@extends('backend.layouts.app')

@section('title', 'Country')

@section('content')
    <x-admin.index title="Country" :items="$items" />
@endsection
