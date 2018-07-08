@extends('layouts.app')
@include('web.header')
@section('layout')
    <main class="main__content">
        <div class="main__content__wrapper">
    @yield('content')
        </div>
    </main>
@endsection