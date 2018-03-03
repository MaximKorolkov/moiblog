<div class="col-sm-4 col-md-4">
    <div class="thumbnail">
        <img src="{{$article->general_image}}"
             width="{{$article->width_image}}" height="{{$article->height_image}}"
             title="{{$article->title}}"
             alt="{{$article->title}}">
        <div class="caption">
            <h3>{{$article->title}}</h3>
            {!! $article->short_description !!}
            <p><a href="{{ action('ArticleController@show' , $article->slug)  }}"
                  class="btn btn-primary" role="button">Читать Далее</a>

        </div>
    </div>
</div>