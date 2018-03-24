@extends('layouts.app')
@section('title' , $novost->title)
@section('meta_description' , $novost->meta_description)
@section('meta_keywords' , $novost->meta_keyword)
@section('author' , $novost->author)

@include('web.header')

@section('layout')
    <div class="container">
<div class="row">
    <div class="col-sm-12">
        <article class="news">
            <header class="news__header">
                <div class="news__background" style="background-image: url({{$novost->general_image}})"></div>
                <h1 class="news__header__h1">{!! $novost->tag_h1 !!}</h1>
                <time class="news__header__time"
                      datetime="{{ $novost->created_at  }}"
                      title="Время создания статьи : {{  $date }}">
                    {{  $date   }}
                </time>
                <span class="news__header__author"><span>{!! $novost->author !!}</span></span>
            </header>

            <div class="news__text">
                {!! $novost->text  !!}
            </div>
            <footer class="news__footer">
            </footer>
        </article>
    </div>
</div>




</div>
@endsection