@extends('layouts.app')

@include('web.header')

@section('layout')


    @foreach($articles as $article)
        @if($article->show_post === 1)

            <div class="col-sm-4 col-md-4">
                <div class="thumbnail">
                    <img src="{{$article->general_image}}"
                         width="300px" height="200px" title="{{$article->title}}" alt="{{$article->title}}">
                    <div class="caption">
                        <h3>{{$article->title}}</h3>
                        {!! $article->short_description !!}
                        <p><a href="{{ action('ArticleController@show' , $article->slug)  }}"
                              class="btn btn-primary" role="button">Читать Далее</a>

                    </div>
                </div>
            </div>

        @endif
    @endforeach


@endsection