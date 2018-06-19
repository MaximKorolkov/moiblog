@extends('web.layout')

@section('content')

    <main class="main__content">
        <div class="main__content__wrapper">
    @foreach($generals as $general)
        @include("web.pieces.{$general->type}_article", [
            'article' => $general,])
    @endforeach

     <section class="home__article__section">

        @foreach($seconds  as $second)
            @include("web.pieces.{$second->type}_article", [
                'article' => $second,])

        @endforeach
            @foreach($thirds  as $third)
                @include("web.pieces.{$third->type}_article", [
                    'article' => $third,])

            @endforeach
            <div class="grid-top">
                <h3>ТОП Статьи</h3>
            </div>
         @foreach($grids as $grid)
             @include("web.pieces.{$grid['type']}_article" , [
             'article' => $grid,])
         @endforeach
     </section>


    @include('web.pieces.slider')
    @include('web.news.news-home')
        </div>
    </main>
@endsection
