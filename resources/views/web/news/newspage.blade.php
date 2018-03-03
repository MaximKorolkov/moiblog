@extends('layouts.app')

@include('web.header')

@section('layout')

    @foreach($novosti as $novost)
        {{$novost->title}}
    @endforeach


@endsection