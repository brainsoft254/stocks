@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @yield('custom_header')
@stop

@section('content')
  @yield('content') 
@stop

@section('css')
  
    @yield('page-style')     
@stop

@section('js')
    @yield('page-script') 
@stop