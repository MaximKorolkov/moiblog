@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
        {{--    @can('create', \App\homeslider::class)--}}
                <a href="{{  action('Admin\HomesliderController@create')  }}">Добавить статью</a>
           {{-- @endcan--}}
            @foreach($sliders as $slider )
                <div class="article">
                    <h2>{{  $slider->title }}</h2>
                   {{-- @can('update', \App\homeslider::class)
                        <a href="{{ action( 'Admin\ArticleController@edit' , $article->id )  }}">Редактировать</a>
                    @endcan--}}
                   {{-- @can('delete', \App\homeslider::class)
                     <form method="post" action="{{ action( 'Admin\ArticleController@destroy' , $article->id )  }}">
                            {{  csrf_field()  }}
                            {{ method_field('DELETE')  }}
                            <button  type="submit"> Удалить</button>
                        </form>
                    @endcan--}}
                </div>
            @endforeach
           {{-- {{ $sliders->appends(request()->except('page'))->links()  }}--}}
        </div>
    </div>
@endsection