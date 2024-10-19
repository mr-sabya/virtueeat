@extends('layouts.admin')
@section('content')
    <x-admin.index title="City" :items="$items" />
    {{$items->links()}}
@endsection
