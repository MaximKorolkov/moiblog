@extends('admin.layout')

@section('content')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <div class="container">
        <div class="main" xmlns="http://www.w3.org/1999/html">
            <div class="wrap-form">
                <form action="{{ action('Admin\ArticleController@store' )  }}" method="post" class="form-horizontal">
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
                                <fieldset class="article-categories">
                                    <label for="category">Категории</label>
                                    @foreach($categories as $category)
                                        <input type="checkbox" name="category[]" value="{{ $category->id  }}" id="category" />
                                        <label for=""> {{  $category->name }} </label>
                                    @endforeach>
                                </fieldset>
                                <br><br>

                                <br><br>
                                <fieldset class="article-rubric">
                                    <label for=rubric"">Руборики</label>
                                    @foreach($rubrics as $rubric)
                                        <input type="checkbox" name="rubric[]" value="{{ $rubric->id  }}" id="rubric"/>
                                        <label for=""> {{  $rubric->name }} </label>
                                    @endforeach>
                                </fieldset>
                                <br><br>
                                <div class="form-group">
                                    <fieldset class="admin-filedsaet">
                                        <label for="title">H1 тег</label>
                                        <input type="text" name="header_h1" id="header_h1"
                                               value="{{old('header_h1') }}"/>
                                        @if($errors->has('header_h1'))
                                            <span class="error"> {{$errors->first('header_h1')}} </span>
                                        @endif
                                    </fieldset>
                                    <fieldset class="admin-filedsaet">
                                        <label for="title">Meta Описание</label>
                                        <input type="text" name="meta_description" id="meta_description"
                                               value="{{old('meta_description') }}"/>
                                        @if($errors->has('meta_description'))
                                            <span class="error"> {{$errors->first('meta_description')}} </span>
                                        @endif
                                    </fieldset>
                                    <fieldset class="admin-filesaet">
                                        <label for="title">Ключевые слова</label>
                                        <input type="text" name="meta_keywords" id="meta_keywords"
                                               value="{{old('meta_keywords') }}"/>
                                        @if($errors->has('meta_keywords'))
                                            <span class="error"> {{$errors->first('meta_keywords')}} </span>
                                        @endif
                                    </fieldset>
                                    <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Выбрать изображение поста в миниатюре
                                </a>
                            </span>
                                        <input id="thumbnail" class="form-control" type="text" name="general_image">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">

                                    <script>$('#lfm').filemanager('image');</script>




                                    <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm-1" data-input="thumbnail-image" data-preview="holder-image" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Выбрать изображение
                                </a>
                            </span>
                                        <input id="thumbnail-image" class="form-control" type="text" name="image" />
                                    </div>
                                    <img id="holder-image" style="margin-top:15px;max-height:100px;">
                                    <script>$('#lfm-1').filemanager('image');</script>

                                    <fieldset>
                                        <label for="">Ширина миниатюры на главной</label>
                                        <input type="text" name="width_image" id="width_image"
                                               value="{{  old('width_image')  }}">
                                        @if($errors->has('width_image'))
                                            <span class="error">{{$errors->first('width_image')}}</span>
                                        @endif
                                    </fieldset>
                                    <fieldset>
                                        <label for="">Высота миниатюры на главной</label>
                                        <input type="text" name="height_image" id="height_image"
                                               value="{{  old('height_image')  }}">
                                        @if($errors->has('height_image'))
                                            <span class="error">{{$errors->first('height_image')}}</span>
                                        @endif
                                    </fieldset>
                                    <fieldset>
                                        <label for="author">Автор статьи</label>
                                        <input type="text" name="author" id="author" value="{{ old('author')  }}"/>
                                        @if($errors->has('author'))
                                            <span class="error">{{$errors->first('author')}}</span>
                                        @endif
                                    </fieldset>
                                    <fieldset>
                                        <label for="type-post">Выберите тип поста</label>
                                        <select name="type" id="type-post">
                                            @foreach($types as $type)
                                                <option value="{{$type}}">{{trans("article.{$type}")}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    <fieldset class="admin-filesaet">
                                        <label for="title">Название предыдущей статьи</label>
                                        <input type="text" name="per_post" id="per_post"
                                               value="{{old('per_post') }}"/>
                                        @if($errors->has('per_post'))
                                            <span class="error"> {{$errors->first('per_post')}} </span>
                                        @endif
                                        <label for="title">Ссылка на предыдущию статью</label>
                                        <input type="text" name=" per_post_url" id="per_post_url"
                                               value="{{old('per_post_url') }}"/>
                                        @if($errors->has('per_post_url'))
                                            <span class="error"> {{$errors->first('pre_post_url')}} </span>
                                        @endif
                                    </fieldset>
                                    <fieldset class="admin-filesaet">
                                        <label for="title">Название следующей статьи</label>
                                        <input type="text" name=" next_post" id="next_post"
                                               value="{{old('next_post') }}"/>
                                        @if($errors->has('next_post'))
                                            <span class="error"> {{$errors->first('next_post')}} </span>
                                        @endif
                                        <label for="title">Ссылка на следующию статью</label>
                                        <input type="text" name=" next_post_url" id="next_post_url"
                                               value="{{old('next_post_url') }}"/>
                                        @if($errors->has('next_post_url'))
                                            <span class="error"> {{$errors->first('next_post_url')}} </span>
                                        @endif
                                    </fieldset>
                                    <fieldset>
                                        <label for="">Показать на главной</label>
                                        <input type="checkbox" name="show_post">
                                    </fieldset>

                                    <fieldset class="admin-filedsaet">

                                        <label for="title">Опубликовать</label>
                                        <input type="checkbox" name="published" id="published"/>

                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <fieldset class="admin-filedsaet">
                                        <label for="title">Краткое описание</label>
                                        <br>
                                        <br>
                                        <textarea name="short_description" id="editor2">
                    {{old('short_description') }}
                </textarea>
                                        @if($errors->has('short_description'))
                                            <span class="error"> {{$errors->first('short_description')}} </span>
                                        @endif

                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <fieldset class="admin-filedsaet">
                                        <label for="title">Текст статьи</label>
                                        <br>
                                        <br>
                                        <textarea id="editor1" name="description">
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
        </div>


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