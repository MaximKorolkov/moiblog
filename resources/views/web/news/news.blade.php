@extends('layouts.app')
@section('title' , $novost->title)
@section('meta_description' , $novost->meta_description)
@section('meta_keywords' , $novost->meta_keyword)
@section('author' , $novost->author)

@include('web.header')

@section('layout')
<div class="row">
    <div class="col-sm-12">
        <article class="article">
            <header class="article__header">
                <h1 class="article__header__h1">{!! $novost->tag_h1 !!}</h1>
                <time class="article__header__time"
                      datetime="{{ $novost->created_at  }}"
                      title="Время создания статьи : {{  $date }}">
                    {{  $date   }}
                </time>
                <span class="article__header__author"><span>{!! $novost->author !!}</span></span>
            </header>

            <div class="article__text">
                {!! $novost->text  !!}
            </div>


            <footer class="article__footer">
            </footer>
        </article>
    </div>




</div>
@endsection