@extends('layouts.app')

@include('web.header')

@section('layout')

    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <form action="{{action('UserPostController@update', [
        'user' => auth()->user()->id,
        'article' => $article->id,
    ])}}" method="post">
        {{csrf_field()}}
        <fieldset>
            <label for="title">Название Статьи</label>
            <input type="text" name="title" id="title"
                   value="{{old('title') ? old('title') : $article->title }}">
            @if($errors->has('title'))
                <span class="error"> {{$errors->first('title')}} </span>
            @endif
        </fieldset>
        <fieldset>
            <label for="header_h1">Заголовок Статьи</label>
            <input type="text" name="header_h1" id="header_h1"
                   value="{{old('header_h1') ? old('header_h1') : $article->header_h1}}">
            @if($errors->has('header_h1'))
                <span class="error"> {{$errors->first('header_h1')}} </span>
            @endif
        </fieldset>
        <div class="input-group">
        <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"
                                value="{{$article->general_image}}">
                                    <i class="fa fa-picture-o"></i> Выбрать изображение поста в миниатюре
                                </a>
                            </span>
            <input id="thumbnail" class="form-control" type="text" value="{{$article->general_image}}" name="general_image">
        </div>
        <img src="{{$article->general_image}}" id="holder" style="margin-top:15px;max-height:100px;">
        <script>$('#lfm').filemanager('image');</script>

        <fieldset>
            <label for="short_description">Краткое описание статьи</label>
            <textarea name="short_description" id="editor">
                {{old('short_description') ? old('short_description') : $article->short_description }}
            </textarea>
        </fieldset>

        <fieldset>
            <label for="description">Полное описание статьи</label>
            <textarea name="description" id="editor1">
                {{old('description') ? old('description') : $article->description }}
            </textarea>
        </fieldset>
        <button type="submit">Сохранить</button>
    </form>
    <script src="{{ asset('/js/ckeditor/ckeditor.js') }}"
            type="text/javascript" charset="utf-8" ></script>
    <script>


        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            /*filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',*/
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            /* filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='*/
        };
        var editor = CKEDITOR.replace('editor', options);
        var editor1 = CKEDITOR.replace('editor1', options);

    </script>


@endsection