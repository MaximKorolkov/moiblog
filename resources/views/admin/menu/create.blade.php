@extends('admin.layout')

@section('content')
<div class="container">

        <div class="main">
        <div class="wrap-form">

    <form action="{{ action('Admin\AdminMenuController@store' )  }}" method="post" class="form-horizontal">
        {{csrf_field()}}
        <div class="field">
        <div class="form-group">
        <fieldset>
            <label for="title">Название</label>
            <input type="text" name="title" id="title"
                   value="{{old('title')}}" />
            @if($errors->has('title'))
                <span class="error"> {{$errors->first('title')}} </span>
            @endif

        </fieldset>
        </div>
        <div class="form-group">
        <fieldset>

            <label data-toggle="tooltip" title="Если хотите поставить произвольную страницу, но напишите ее Url адрес - по типу /ссылка . Слеш в начале ОБЯЗАТЕЛЕН!" for="title">URL<b class="glyphicon glyphicon-question-sign"></b></label>
            <input type="text" name="you_url" id="you_url"
                   value="{{old('you_url') }}" />
            @if($errors->has('you_url'))
                <span class="error"> {{$errors->first('you_url')}} </span>
            @endif

        </fieldset>
            <fieldset>
                <label data-toggle="tooltip" title="Выберите URL адрес из категорий" for="url">Выбрать из категории <b class="glyphicon glyphicon-question-sign"></b></label>
                <select name="url" id="url">
                    <option value="">Произвольная ссылка</option>
                    <optgroup label = "&nbsp&nbspКатегории">
                    @foreach($categories as $category)
                        <option value="{{'category' . '/' . $category->slug}}">{{$category->name}}</option>
                    @endforeach
                    </optgroup>
                </select>

            </fieldset>
            <fieldset>

                <label for="title">Позиция меню (0-9)</label>
                <input type="text" name="position" id="position"
                       value="{{old('position') }}" />
                @if($errors->has('position'))
                    <span class="error"> {{$errors->first('position')}} </span>
                @endif

            </fieldset>
        </div>
            <fieldset>

                <label for="published">Опубликовать </label>
                <input type="checkbox" name="published" id="published">

            </fieldset>
        </div>




        <button type="submit">Сохранить</button>



    </form>
        </div>
        </div>

</div>


@endsection