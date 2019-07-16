@extends('layout')
@section('body')
    <editor :paste='@json($paste)' :read-only="false" class="h-full"></editor>
@endsection