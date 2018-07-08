@extends('layouts.app')
@section('title' , $article->title)
@section('meta_description' , $article->meta_description)
@section('meta_keywords' , $article->meta_keywords)
@section('author' , $article->author)

@include('web.header')

@section('layout')


    <article class="article">
        <header class="article__header">
            @if($article->image != '')
                <div class="article__header-bg" style="background-image: url({{$article->image}})"  >
                    @endif

                    <div class="line-read">
                    <h1 class="article__header__h1">{!! $article->header_h1 !!}</h1>
                    </div>
                    </div>
        </header>
       <div class="article__wrapper">
                    <time class="article__header__time"
                          datetime="{{ $article->created_at  }}"
                          title="Время создания статьи : {{  $date }}">
                        {{  $date   }}
                    </time>

                    <span class="article__header__author"><span>{!! $user_articles->name !!}</span></span>


                <div class="article__text">
                    {!! $article->description  !!}
                </div>


            <footer class="article__footer">
                <div class="rubric">
                    <h3>Рубрики</h3>
                @foreach($rubrics as $rubric)
                    <a href="{{'/rubric' .'/'.$rubric->url}}">{{  $rubric->name  }}</a>
                @endforeach
                </div>
                @if(isset($article->per_post) and isset($article->per_post_url))
                 <a class="article_footer__prev" href="{{ '/article' . '/' . $article->per_post_url }}">
                     <i class="glyphicon glyphicon-backward"></i>
                     {!! $article->per_post !!}
                 </a>
                 @endif

                @if(isset($article->next_post) and isset($article->next_post_url) )
                 <a class="article__footer__next" href="{{ '/article' . '/' .  $article->next_post_url }}">
                     {!! $article->next_post !!}
                     <i class="glyphicon glyphicon-forward"></i>
                 </a>
                 @endif
                 <a class="article__footer__comment" href="#">Коментарии</a>

            </footer>
           @include('web.pieces.comment')
       </div>

    </article>
    @endsection