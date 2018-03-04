@extends('web.layout')

@section('content')
    @foreach($generals as $general)
        @include("web.pieces.{$general->type}_article", [
            'article' => $general,
        ])
    @endforeach

        @foreach($articles as $article)
            @include("web.pieces.{$article->type}_article", [
                'article' => $article,
            ])
        @endforeach

    @include('web.pieces.slider')


@endsection