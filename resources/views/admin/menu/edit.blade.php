@extends('admin.layout')

@section('content')
    <div class="container">

    <form action="{{ action('Admin\AdminMenuController@update' , $menu->id)  }}" method="post">
        {{csrf_field()}}
        <fieldset>
            <label for="title">Название</label>
            <input type="text" name="title" id="title"
                   value="{{old('menu') ? old('menu') : $menu->title}}" />
            @if($errors->has('title'))
                <span class="error"> {{$errors->first('title')}} </span>
            @endif

        </fieldset>
        <fieldset>
            <label for="you_url">URL</label>
            <input type="text" name="you_url" id="you_url"
                   value="{{old('you_url') ? old('you_url') : $menu->you_url}}" />
            @if($errors->has('you_url'))
                <span class="error"> {{$errors->first('you_url')}} </span>
            @endif
        </fieldset>
        <fieldset>
            <label data-toggle="tooltip" title="Выберите URL адрес из категорий" for="url">Выбрать из категории <b class="glyphicon glyphicon-question-sign"></b></label>
            <select name="url" id="url">
                <optgroup label = "&nbsp&nbspКатегории">
                @foreach($categories as $category)
                    <option value="{{'category' . '/' . $category->slug}}" {{ $category->slug ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
                </optgroup>
                <optgroup label = "&nbsp&nbspСтраницы">
                    @foreach($singlePage as $single)
                        <option value="{{$single->url}}" {{ $single->url ? 'selected' : '' }}>{{$single->title}}</option>
                    @endforeach
                </optgroup>
            </select>
        </fieldset>

        <fieldset>
            <label for="published"> Опубликовать</label>
            <input type="checkbox" name="published" id="published" {{ $menu->published ? 'checked=1' : ''  }}>

        </fieldset>
        <fieldset>

            <label for="title">Позиция меню (0/8)</label>
            <input type="text" name="position" id="position"
                   value="{{old('position') ? old('position') : $menu->position}}" />
            @if($errors->has('position'))
                <span class="error"> {{$errors->first('position')}} </span>
            @endif

        </fieldset>

        <fieldset>
            <label for="title"> Родительская категория</label>
            <input type="text" name="parent_id" id="parent-Id"
                   value="{{old('parent-Id') ? old('parent_id') : $menu->parent_id}}" />
            @if($errors->has('parent_id'))
                <span class="error"> {{$errors->first('parent_id')}} </span>
            @endif

        </fieldset>

        <button type="submit">Сохранить</button>



    </form>

    </div>
@endsection