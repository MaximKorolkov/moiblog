@extends('web.layout')

@section('content')

<div class="category__content">
    @foreach($articles as $article)

        <div class="category__item">
            <div class="category__item__image">
                <img src="{{$article->general_image}}" alt="{{$article->title}}" title="{{$article->title}}">
            </div>
            <div class="category__item__text">
                <h3>{!! $article->title !!}</h3>
                <p>{!! $article->short_description !!}</p>
            </div>
        </div>


    @endforeach
</div>
















@endsection