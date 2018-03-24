@extends('layouts.app')

@include('web.header')

@section('layout')
    <div class="container">
    <div class="row">
    @foreach($novosti as $novost)
            <a href="{{'news' . '/' . $novost->url }}">
        <div class="col-sm-4 col-md-4">
            <div class="thumbnail">
        <img
             src="{{$novost->general_image}}"
             alt="{{$novost->title}}"
             title="{{$novost->title}}"
             width="{{$novost->img_width}}"
             height="{{$novost->img_height}}"
        />
                <div class="caption">
                    <p>{{$novost->title}}</p>

            </div>
            </div>
    </div>
            </a>
    @endforeach
    </div>
    </div>
@endsection