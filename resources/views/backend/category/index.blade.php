@extends('backend.layouts.app')
@section('content')
    <x-admin.index title="Category" :items="$items" />
@endsection
