<div class="jumbotron" style="background-image: url({{$article->general_image}})">
    <div class="container">
        <h2>{{$article->title}}</h2>
        <p>{!! $article->short_description !!}</p>
        <p>
            <a href="{{ action('ArticleController@show' , $article->slug)  }}"
               class="btn btn-primary btn-lg"
               role="button">Узнать больше
            </a>
        </p>
    </div>
</div>