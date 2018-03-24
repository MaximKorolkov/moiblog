@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            @can('create', \Silber\Bouncer\Database\Role::class)
                <a href="{{  action('Admin\RoleController@create')  }}">Создать роль</a>
            @endcan
            @foreach($roles as $role )
                <div class="article">
                    <h2>{{ $role->title }}</h2>
                    @can('update', \Silber\Bouncer\Database\Role::class)
                        <a href="{{ action( 'Admin\RoleController@edit' , $role->id)  }}">Редактировать</a>
                    @endcan
                    @can('delete', \Silber\Bouncer\Database\Role::class)
                        <form method="post" action="{{ action( 'Admin\RoleController@destroy', $role->id )  }}">
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