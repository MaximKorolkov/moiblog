@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <a href="{{  action('Admin\CategoryController@create')  }}">Создать категорию</a>
        @foreach($categories as $category )
            <div class="article">
            <h2>{{  $category->name }}</h2>
                <a href="{{ action( 'Admin\CategoryController@edit' , $category->id )  }}">Редактировать</a>
                <form method="post" action="{{ action( 'Admin\CategoryController@destroy' , $category->id )  }}">
                    {{  csrf_field()  }}
                    {{ method_field('DELETE')  }}
                    <button  type="submit"> Удвлить</button>
                </form>

            </div>
        @endforeach
            {{ $categories->appends(request()->except('page'))->links()  }}
    </div>
</div>
@endsection