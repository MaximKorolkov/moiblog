@extends('admin.layout')

@section('content')
    <div class="container">
    <div class="row">

        <a href="{{  action('Admin\AdminMenuController@create')  }}">Создать Меню</a>
        @foreach($menu as $m )
            <div class="article">
            <h2>{{  $m->title }}</h2>
                <a href="{{ action( 'Admin\AdminMenuController@edit' , $m->id )  }}">Редактировать</a>
                <form method="post" action="{{ action( 'Admin\AdminMenuController@destroy' , $m->id )  }}">
                    {{  csrf_field()  }}
                    {{ method_field('DELETE')  }}
                    <button  type="submit"> Удвлить</button>
                </form>

            </div>
        @endforeach

    </div>
    </div>
@endsection