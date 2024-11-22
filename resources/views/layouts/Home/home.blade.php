@extends('layouts.app')


@section('title', 'Home')


@section('css')
    <link rel="stylesheet" href="public/Css/login.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
@endsection


@section('content')

    @if (session('message'))
    <div class="toast">
        <div class="toast-content">
          <i class="uil uil-check toast-check"></i>
          <div class="message">
            <span class="message-text text-1">Bienvenido {{ Auth::user()->name }}</span>
            <span class="message-text text-2">{{ session('message') }}</span>
          </div>
        </div>
        <i class="uil uil-multiply toast-close"></i>
        <div class="progress"></div>
      </div>
    @endif

    <h1>Home</h1>    
@endsection


@section('javascript')
    <script src="public/Js/Home/home.js"></script>
@endsection

    