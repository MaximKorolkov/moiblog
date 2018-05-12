@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            @can('create', \App\User::class)
                <a href="{{  action('Admin\UserController@create')  }}">Создать пользователя</a>
            @endcan
            @foreach($users as $user)
                <div class="article">
                    <h2>{{ $user->name }}</h2>
                    <p>{{ $user->email  }}</p>
                    @can('update', \App\User::class)
                        <a href="{{ action( 'Admin\UserController@edit' , $user->id)  }}">Редактировать</a>
                    @endcan
                    @can('delete', \App\User::class)
                        <form method="post" action="{{ action( 'Admin\UserController@destroy', $user->id )  }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE')  }}
                            <button  type="submit">Удалить</button>
                        </form>
                    @endcan
                </div>
            @endforeach
        </div>
    </div>
@endsection