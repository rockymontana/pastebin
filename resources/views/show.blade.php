@extends('layout')
@section('body')
<editor :paste='@json($paste)' :read-only="true" class="h-full"></editor>
@endsection
@push('head')
<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro&display=swap" rel="stylesheet">
@endpush