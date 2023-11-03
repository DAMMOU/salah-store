@extends('layouts.master')
@section('content')
    @include('components.user.header')
    @include('components.user.products')
    @include('components.user.categories')
    @include('components.user.cart')   
@endsection
