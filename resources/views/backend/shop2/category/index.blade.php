@extends('backend.layouts.app')

@section('title', 'Category')

@section('content')
<x-admin.index title="ProductCategory" :items="$items" />
@endsection