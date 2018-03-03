@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{  action('Admin\NovostController@create')  }}">Создать новсть</a>
            @foreach($novost as $novos )
                <div class="article">
                    <h2>{{  $novos->title }}</h2>
                    <a href="{{ action( 'Admin\NovostController@edit' , $novos->id )  }}">Редактировать</a>
                    <form method="post" action="{{ action( 'Admin\NovostController@destroy' , $novos->id )  }}">
                        {{  csrf_field()  }}
                        {{ method_field('DELETE')  }}
                        <button  type="submit"> Удалить</button>
                    </form>

                </div>
            @endforeach
            {{ $novost->appends(request()->except('page'))->links()  }}
        </div>
    </div>
@endsection