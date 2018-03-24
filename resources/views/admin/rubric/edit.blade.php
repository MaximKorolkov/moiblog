@extends('admin.layout')

@section('content')

    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <div class="container">
        <div class="main" xmlns="http://www.w3.org/1999/html">
            <div class="wrap-form">
                <form action="{{ action('Admin\RubricController@update' , $rubrics->id )  }}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="col-sm-12">
                        <div class="field">
                            <div class="form-group">
                                <fieldset class="admin-fildesaet">
                                    <label for="name">Название</label>
                                    <input type="text" name="name" id="name"
                                           value="{{old('name') ? old('name') : $rubrics->name}}"/>
                                    @if($errors->has('name'))
                                        <span class="error"> {{$errors->first('name')}} </span>
                                    @endif

                                </fieldset>

                                <fieldset class="admin-fildesaet">
                                    <label for="title">Title Рубрики</label>
                                    <input type="text" name="title" id="title"
                                           value="{{old('title') ? old('title') : $rubrics->title}}"/>
                                    @if($errors->has('title'))
                                        <span class="error"> {{$errors->first('title')}} </span>
                                    @endif

                                </fieldset>

                                <fieldset class="admin-fildesaet">
                                    <label for="url">Url Рубрики</label>
                                    <input type="text" name="url" id="url"
                                           value="{{old('url') ? old('url') : $rubrics->url}}"/>
                                    @if($errors->has('url'))
                                        <span class="error"> {{$errors->first('url')}} </span>
                                    @endif

                                </fieldset>

                                <br><br>
                                <div class="form-group">

                                    <fieldset class="admin-filedsaet">
                                        <label for="title">Meta Описание</label>
                                        <input type="text" name="meta_description" id="meta_description"
                                               value="{{old('meta_description') ? old('meta_description') : $rubrics->meta_description }}"/>
                                        @if($errors->has('meta_description'))
                                            <span class="error"> {{$errors->first('meta_description')}} </span>
                                        @endif
                                    </fieldset>
                                    <fieldset class="admin-filesaet">
                                        <label for="title">Ключевые слова</label>
                                        <input type="text" name="meta_keywords" id="meta_keywords"
                                               value="{{old('meta_keywords') ? old('meta_keywords') : $rubrics->meta_keywords }}"/>
                                        @if($errors->has('meta_keywords'))
                                            <span class="error"> {{$errors->first('meta_keywords')}} </span>
                                        @endif
                                    </fieldset>
                                    <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Выбрать изображение рубрики в миниатюре
                                </a>
                            </span>
                                        <input id="thumbnail" class="form-control" type="text" name="image"
                                               value="{{old('image') ? old('image') : $rubrics->image}}" >
                                    </div>
                                    <img src="{{old('image') ? old('image') : $rubrics->image}}"
                                         id="holder" style="margin-top:15px;max-height:100px;">

                                    <script>$('#lfm').filemanager('image');</script>

                                    <fieldset>
                                        <label for="">Показать картинку</label>
                                        <input type="checkbox" name="show_image" {{ $rubrics->show_image ? 'checked=1': '' }}>
                                    </fieldset>

                                    <fieldset class="admin-filedsaet">

                                        <label for="published">Опубликовать</label>
                                        <input type="checkbox" name="published" id="published" {{ $rubrics->published ? 'checked=1' : ''  }}/>

                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <fieldset class="admin-filedsaet">
                                        <label for="title">Описание Рубрики</label>
                                        <br>
                                        <br>
                                        <textarea id="editor1" name="description">
                    {{old('description') ? old('description')  : $rubrics->description}}

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
        </div>


        <script>
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
            var editor1 = CKEDITOR.replace('editor1', options);

        </script>
    </div>
@endsection
