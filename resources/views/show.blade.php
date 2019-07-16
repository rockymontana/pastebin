@extends('layout')
@section('body')
<editor :paste='@json($paste)' :read-only="true" class="h-full"></editor>
@endsection