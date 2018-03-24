@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        @can('create', \App\Article::class)
            <a href="{{  action('Admin\ArticleController@create')  }}">Создать статью</a>
        @endcan
        @foreach($articles as $article )
            <div class="article">
            <h2>{{  $article->title }}</h2>
                @can('update', \App\Article::class)
                    <a href="{{ action( 'Admin\ArticleController@edit' , $article->id )  }}">Редактировать</a>
                @endcan
                @can('delete', \App\Article::class)
                    <form method="post" action="{{ action( 'Admin\ArticleController@destroy' , $article->id )  }}">
                        {{  csrf_field()  }}
                        {{ method_field('DELETE')  }}
                        <button  type="submit"> Удалить</button>
                    </form>
                @endcan
            </div>
        @endforeach
        {{ $articles->appends(request()->except('page'))->links()  }}
    </div>
</div>
@endsection