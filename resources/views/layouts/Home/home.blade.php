@extends('layouts.app')


@section('title', 'Home')


@section('css')
    {{-- <link rel="stylesheet" href="Css/login.css"> --}}
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
@endsection


@section('content')

    @if (session('message'))
      {{ session('message') }}
    @endif

    <h1>Home</h1>    
@endsection


@section('javascript')
    {{-- <script src="Js/Home/home.js"></script> --}}
@endsection

    