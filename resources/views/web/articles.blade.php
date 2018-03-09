@extends('layouts.app')
@section('title' , $article->title)
@section('meta_description' , $article->meta_description)
@section('meta_keywords' , $article->meta_keywords)
@section('author' , $article->author)

@include('web.header')

@section('layout')
    <div class="row">
       <div class="col-sm-12">
           <article class="article">
                <header class="article__header">
                    <h1 class="article__header__h1">{!! $article->header_h1 !!}</h1>
                    <time class="article__header__time"
                          datetime="{{ $article->created_at  }}"
                          title="Время создания статьи : {{  $date }}">
                        {{  $date   }}
                    </time>
                    <span class="article__header__author"><span>{!! $article->author !!}</span></span>
                </header>

                <div class="article__text">
                    {!! $article->description  !!}
                </div>


            <footer class="article__footer">
                @if(isset($article->per_post) and isset($article->per_post_url))
                 <a class="article_footer__prev" href="{!! $article->per_post_url !!}">
                     <i class="glyphicon glyphicon-backward"></i>
                     {!! $article->per_post !!}
                 </a>
                 @endif
                <span class="article__footer__space">  || </span>
                @if(isset($article->next_post) and isset($article->next_post_url) )
                 <a class="article__footer__next" href="{!!  $article->next_post_url !!}">
                     {!! $article->next_post !!}
                     <i class="glyphicon glyphicon-forward"></i>
                 </a>
                 @endif
                 <a class="article__footer__comment" href="#">Коментарии</a>

            </footer>
               </article>
           @include('web.pieces.comment')
       </div>




    </div>
    @endsection