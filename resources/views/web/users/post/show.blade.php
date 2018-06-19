@extends('layouts.app')

@include('web.header')

@section('layout')

    @foreach($articles as $article)
        <br>
        {{$article->title}}
        <br>
        {!! $article->short_description  !!}
        <br>
    @endforeach

@endsection