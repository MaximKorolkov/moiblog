@extends('layouts.app')

@include('web.header')

@section('layout')

    <h1>{{$singlePage->title}}</h1>
    {!! $singlePage->content !!}


@endsection