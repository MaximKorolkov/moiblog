@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="main" xmlns="http://www.w3.org/1999/html">
            <div class="wrap-form">
                <form action="{{ action('Admin\NovostController@store' )  }}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="col-sm-12">
                        <div class="field">
                            <div class="form-group">
                                <fieldset class="admin-fildesaet">
                                    <label for="title">Название</label>
                                    <input type="text" name="title" id="title"
                                           value="{{old('title')}}"/>
                                    @if($errors->has('title'))
                                        <span class="error"> {{$errors->first('title')}} </span>
                                    @endif

                                </fieldset>
                                <fieldset class="admin-fildesaet">
                                    <label for="url">URL адресс</label>
                                    <input type="text" name="url" id="url"
                                           value="{{old('url')}}"/>
                                    @if($errors->has('url'))
                                        <span class="error"> {{$errors->first('url')}} </span>
                                    @endif

                                </fieldset>
                                <br><br>

                                <div class="form-group">
                                    <fieldset class="admin-filedsaet">
                                        <label for="tag_h1">H1 тег</label>
                                        <input type="text" name="tag_h1" id="tag_h1"
                                               value="{{old('tag_h1') }}"/>
                                        @if($errors->has('tag_h1'))
                                            <span class="error"> {{$errors->first('tag_h1')}} </span>
                                        @endif
                                    </fieldset>
                                    <fieldset class="admin-filedsaet">
                                        <label for="meta_description">Meta Описание</label>
                                        <input type="text" name="meta_description" id="meta_description"
                                               value="{{old('meta_description') }}"/>
                                        @if($errors->has('meta_description'))
                                            <span class="error"> {{$errors->first('meta_description')}} </span>
                                        @endif
                                    </fieldset>
                                    <fieldset class="admin-filesaet">
                                        <label for="meta_keyword">Ключевые слова</label>
                                        <input type="text" name="meta_keyword" id="meta_keyword"
                                               value="{{old('meta_keyword') }}"/>
                                        @if($errors->has('meta_keyword'))
                                            <span class="error"> {{$errors->first('meta_keyword')}} </span>
                                        @endif
                                    </fieldset>
                                    <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Выбрать изображение поста
                                </a>
                            </span>
                                        <input id="thumbnail" class="form-control" type="text" name="general_image">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                    <script>$('#lfm').filemanager('image');</script>
                                    <fieldset>
                                        <label for="img_width">Ширина миниатюры на главной</label>
                                        <input type="text" name="img_width" id="img_width"
                                               value="{{  old('img_width')  }}">
                                        @if($errors->has('img_width'))
                                            <span class="error">{{$errors->first('img_width')}}</span>
                                        @endif
                                    </fieldset>
                                    <fieldset>
                                        <label for="img_height">Высота миниатюры на главной</label>
                                        <input type="text" name="img_height" id="img_height"
                                               value="{{  old('img_height')  }}">
                                        @if($errors->has('img_height'))
                                            <span class="error">{{$errors->first('img_height')}}</span>
                                        @endif
                                    </fieldset>
                                    <fieldset>
                                        <label for="author">Автор новости</label>
                                        <input type="text" name="author" id="author" value="{{ old('author')  }}"/>
                                        @if($errors->has('author'))
                                            <span class="error">{{$errors->first('author')}}</span>
                                        @endif
                                    </fieldset>
                                    <fieldset>
                                        <label for="show_news">Показать на главной в колонке новости</label>
                                        <input type="checkbox" name="show_news">
                                    </fieldset>
                                    <fieldset class="admin-filedsaet">

                                        <label for="published">Опубликовать</label>
                                        <input type="checkbox" name="published" id="published"/>

                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <fieldset class="admin-filedsaet">
                                        <label for="text">Текст новости</label>
                                        <br>
                                        <br>
                                        <textarea id="editor1" name="text">
                    {{old('description') }}

                </textarea>
                                        @if($errors->has('description'))
                                            <span class="error"> {{$errors->first('description')}} </span>
                                        @endif

                                    </fieldset>
                                </div>


                                <button type="submit">Сохранить</button>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>в


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
    </div>
@endsection