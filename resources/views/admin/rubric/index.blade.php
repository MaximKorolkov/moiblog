@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">

                <a href="{{  action('Admin\RubricController@create')  }}">Создать новую рубрику</a>

            @foreach($rubrics as $rubric )
                <div class="article">
                    <h2>{{  $rubric->name }}</h2>

                        <a href="{{ action( 'Admin\RubricController@edit' , $rubric->id )  }}">Редактировать</a>


                        <form method="post" action="{{ action( 'Admin\RubricController@destroy' , $rubric->id )  }}">
                            {{  csrf_field()  }}
                            {{ method_field('DELETE')  }}
                            <button  type="submit"> Удалить</button>
                        </form>

                </div>
            @endforeach
            {{ $rubrics->appends(request()->except('page'))->links()  }}
        </div>
    </div>
@endsection