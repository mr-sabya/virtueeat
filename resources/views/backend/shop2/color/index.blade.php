@extends('backend.layouts.app')

@section('title', 'Color')

@section('content')
<x-admin.index title="ProductColor" :items="$items" />
@endsection