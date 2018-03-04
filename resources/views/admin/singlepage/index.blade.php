@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{  action('Admin\SinglePageController@create')  }}">Создать Страницу</a>
            @foreach($singlePage as $single )
                <div class="article">
                    <h2>{{  $single->title }}</h2>
                    <a href="{{ action( 'Admin\SinglePageController@edit' , $single->id )  }}">Редактировать</a>
                    <form method="post" action="{{ action( 'Admin\SinglePageController@destroy' , $single->id )  }}">
                        {{  csrf_field()  }}
                        {{ method_field('DELETE')  }}
                        <button  type="submit"> Удалить</button>
                    </form>

                </div>
            @endforeach
            {{ $singlePage->appends(request()->except('page'))->links()  }}
        </div>
    </div>
@endsection