@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{  action('Admin\SliderController@create')  }}">Создать слайдер</a>
            @foreach($sliders as $slider )
                <div class="article">
                    <h2>{{  $slider->title }}</h2>
                    <a href="{{ action( 'Admin\SliderController@edit' , $slider->id )  }}">Редактировать</a>
                    <form method="post" action="{{ action( 'Admin\SliderController@destroy' , $slider->id )  }}">
                        {{  csrf_field()  }}
                        {{ method_field('DELETE')  }}
                        <button  type="submit"> Удалить</button>
                    </form>

                </div>
            @endforeach
            {{ $sliders->appends(request()->except('page'))->links()  }}
        </div>
    </div>
@endsection