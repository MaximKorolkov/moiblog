@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <a href="{{  action('Admin\ArticleController@create')  }}">Создать статью</a>
        @foreach($articles as $article )
            <div class="article">
            <h2>{{  $article->title }}</h2>
                <a href="{{ action( 'Admin\ArticleController@edit' , $article->id )  }}">Редактировать</a>
                <form method="post" action="{{ action( 'Admin\ArticleController@destroy' , $article->id )  }}">
                    {{  csrf_field()  }}
                    {{ method_field('DELETE')  }}
                    <button  type="submit"> Удвлить</button>
                </form>

            </div>
        @endforeach
        {{ $articles->appends(request()->except('page'))->links()  }}
    </div>
</div>
@endsection