@extends('layouts.app')

@include('web.header')

@section('layout')
    <div class="container">
        <div class="row">
            <div class="user-post">
                <div class="user-post-wrapper">

                    <a href="{{action('UserPostController@create', auth()->user()->id)}}">Создать статью</a>

            @foreach($articles as $article )

                <div class="user-post-item">
                    <h2>{{  $article->title }}</h2>
                    @if(isset($article->general_image))
                    <div class="user-post-image">
                        <img src="{{$article->general_image}}" alt="{{ $article->title }}" width="550" height="300">
                        </div>

                    @endif
                    <a href="{{ action( 'UserPostController@edit', [
                        'user' => auth()->user()->id,
                        'article' => $article->id,
                    ])  }}">Редактировать</a>
                </div>
            @endforeach
             </div>
            </div>
        </div>
    </div>

@endsection