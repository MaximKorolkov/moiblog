@extends('layouts.app')

@include('web.header')

@section('layout')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <form action="{{action('UserPostController@store' , auth()->user()->id)}}" method="post">
        <fieldset>
        <label for="title">Название Статьи</label>
            <input type="text" name="title" id="title" value="{{old('title')}}">
            @if($errors->has('title'))
                <span class="error"> {{$errors->first('title')}} </span>
            @endif
        </fieldset>
        <fieldset>
            <label for="header_h1">Заголовок Статьи</label>
            <input type="text" name="header_h1" id="header_h1" value="{{old('header_h1')}}">
            @if($errors->has('header_h1'))
                <span class="error"> {{$errors->first('header_h1')}} </span>
            @endif
        </fieldset>
        <fieldset>
            <label for="short_description">Краткое описание статьи</label>
            <textaria name="short_description" id="editor1">
                {{old('short_description') }}
            </textaria>
        </fieldset>

        <fieldset>
            <label for="description">Полное описание статьи</label>
            <textaria name="description" id="editor2">
                {{old('description') }}
            </textaria>
        </fieldset>
        <button type="submit">Сохранить</button>
    </form>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        var editor2 = CKEDITOR.replace('editor1', options);
        var editor1 = CKEDITOR.replace('editor2', options);
    </script>
@endsection