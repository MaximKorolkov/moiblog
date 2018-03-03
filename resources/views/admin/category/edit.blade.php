@extends('admin.layout')

@section('content')
<div class="container">
    <form action="{{ action('Admin\CategoryController@update' , $category->id)  }}" method="post">
        {{csrf_field()}}
        <fieldset>
            <label for="name">Название</label>
            <input type="text" name="name" id="name"
                   value="{{old('name') ? old('name') : $category->name}}" />
            @if($errors->has('name'))
                <span class="error"> {{$errors->first('name')}} </span>
            @endif

        </fieldset>

        <fieldset>
            <label for="slug">SEO УРЛ </label>
            <input type="text" name="slug" id="slug"
                   value="{{old('slug') ? old('slug') : $category->slug}}" />
            @if($errors->has('slug'))
                <span class="error"> {{$errors->first('slug')}} </span>
            @endif

        </fieldset>


        <fieldset>
            <label for="name">Опубликовать</label>
            <input type="checkbox" name="published" {{ $category->published ? 'checked=1' : '' }}/>
        </fieldset>


        <button type="submit">Сохранить</button>



    </form>

</div>
@endsection