@extends('backend.layouts.app')

@section('title', 'Dietary')

@section('content')
    <x-admin.index title="Dietary" :items="$items" />
@endsection
