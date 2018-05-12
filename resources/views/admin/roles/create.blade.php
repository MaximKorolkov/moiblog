@extends('admin.layout')

@section('content')
    <div class="container">
        <form action="{{ action('Admin\RoleController@store' )  }}" method="post">
            {{csrf_field()}}
            <fieldset>
                <label for="name">Название</label>
                <input type="text" name="name" id="name"
                       value="{{old('name')}}" />
                @if($errors->has('name'))
                    <span class="error"> {{ $errors->first('name') }} </span>
                @endif

            </fieldset>
            <fieldset>
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                       value="{{old('title')}}" />
                @if($errors->has('title'))
                    <span class="error"> {{ $errors->first('title') }} </span>
                @endif
            </fieldset>

            <button type="submit">Сохранить</button>
        </form>
    </div>

@endsection