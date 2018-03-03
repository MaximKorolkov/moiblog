<div class="col-sm-5">
    <div class="jumbotron s-t-size" style="background-image: url({{$article->general_image}})">
        <div class="container">
            <h4>{{$article->title}}</h4>
            <p>{!! $article->short_description !!}</p>

                <a href="{{ action('ArticleController@show' , $article->slug)  }}"
                   class="btn btn-primary btn-lg"
                   role="button">Подробнее
                </a>

        </div>
    </div>
</div>