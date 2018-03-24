@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
                <div class="article">
                    @foreach($comments as $comment )
                    <h2>{{  $comment->name }}</h2>
                    <a href="{{--{{ action( 'Admin\CommentController@edit' , $comment->id )  }}--}}">Редактировать</a>
                    <form method="post" action="{{--{{ action( 'Admin\CommentController@destroy' , $comment->id )  }}--}}">
                        {{  csrf_field()  }}
                        {{--{{ method_field('DELETE')  }}
                        <button  type="submit"> Удалить</button>--}}
                    </form>

                    @endforeach
                </div>


            {{--{{ $comments->appends(request()->except('page'))->links()  }}--}}
        </div>
    </div>
@endsection