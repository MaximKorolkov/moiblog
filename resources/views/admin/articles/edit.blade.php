@extends('admin.layout')

@section('content')
    <div class="container">


        <form action="{{ action('Admin\ArticleController@update' , $article->id)  }}" method="post">
            {{csrf_field()}}


            <fieldset>
                <label for="title">Название</label>
                <input type="text" name="title" id="title"
                       value="{{old('title') ? old('title') : $article->title}}"/>
                @if($errors->has('title'))
                    <span class="error"> {{$errors->first('title')}} </span>
                @endif

            </fieldset>
            <fieldset>
                @foreach($categories as $category)

                    <input type="checkbox" name="category[]" value="{{ $category->id  }}"
                            {{ $article->categories()->find($category->id) ? 'checked=checked' : '' }} >
                    <label for=""> {{  $category->name }} </label>

                @endforeach
            </fieldset>
            <fieldset>
                <label for="title">H1 тег</label>
                <input type="text" name="header_h1" id="header_h1"
                       value="{{old('header_h1') ? old('header_h1') : $article->header_h1}}"/>
                @if($errors->has('header_h1'))
                    <span class="error"> {{$errors->first('header_h1')}} </span>
                @endif

            </fieldset>

            <fieldset>
                <label for="title">Meta-описание</label>
                <input type="text" name="meta_description" id="meta_description"
                       value="{{old('meta_description') ? old('meta_description') : $article->meta_description}}"/>
                @if($errors->has('meta_description'))
                    <span class="error"> {{$errors->first('meta_description')}} </span>
                @endif

            </fieldset>

            <fieldset>
                <label for="title">Ключевые слова</label>
                <input type="text" name="meta_keywords" id="meta_keywords"
                       value="{{old('meta_keywords') ? old('meta_keywords') : $article->meta_keywords }}"/>
                @if($errors->has('meta_keywords'))
                    <span class="error"> {{$errors->first('meta_keywords')}} </span>
                @endif
            </fieldset>
            <div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Выбрать изображение поста
     </a>
   </span>
                <input id="thumbnail" class="form-control" type="text" name="general_image"
                       value="{{$article->general_image}}">
            </div>
            <img src="{{$article->general_image}}" id="holder" style="margin-top:15px;max-height:100px;">
            <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
            <script>$('#lfm').filemanager('image');</script>
            <fieldset>
                <label for="">Ширина миниатюры на главной</label>
                <input type="text" name="width_image" id="width_image"
                       value="{{old('width_image') ? old('width_image') : $article->width_image}}">
                @if($errors->has('width_image'))
                    <span class="error">{{$errors->first('width_image')}}</span>
                @endif
            </fieldset>
            <fieldset>
                <label for="">Высота миниатюры на главной</label>
                <input type="text" name="height_image" id="height_image"
                       value="{{old('height_image') ? old('height_image') : $article->height_image}}">
                @if($errors->has('height_image'))
                    <span class="error">{{$errors->first('height_image')}}</span>
                @endif
            </fieldset>
            <fieldset>
                <label for="author">Автор статьи</label>
                <input type="text" name="author" id="author"
                       value="{{old('author') ? old('author') : $article->author}}"/>
                @if($errors->has('author'))
                    <span class="erros">{{$errors->first('author')}}</span>
                @endif
            </fieldset>
            <fieldset>
                <label for="type">Тип статьи</label>
                <select name="type" id="type">
                    @foreach($types as $type)
                        <option value="{{$type}}" {{ $article->type && $article->type == $type ? 'selected' : '' }}>
                            {{trans("article.{$type}")}}
                        </option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset>
                <fieldset class="admin-filesaet">
                    <label for="title">Название предыдущей статьи</label>
                    <input type="text" name="per_post" id="per_post"
                           value="{{old('per_post') ? old('per_post') : $article->per_post  }}"/>
                    @if($errors->has('per_post'))
                        <span class="error"> {{$errors->first('per_post')}} </span>
                    @endif
                    <label for="title">Ссылка на предыдущию статью</label>
                    <input type="text" name=" per_post_url" id="per_post_url"
                           value="{{old('per_post_url') ? old('per_post_url') : $article->per_post_url }}"/>
                    @if($errors->has('per_post_url'))
                        <span class="error"> {{$errors->first('pre_post_url')}} </span>
                    @endif
                </fieldset>
                <fieldset class="admin-filesaet">
                    <label for="title">Название следующей статьи</label>
                    <input type="text" name=" next_post" id="next_post"
                           value="{{old('next_post') ? old('next_post') : $article->next_post}}"/>
                    @if($errors->has('next_post'))
                        <span class="error"> {{$errors->first('next_post')}} </span>
                    @endif
                    <label for="title">Ссылка на следующию статью</label>
                    <input type="text" name=" next_post_url" id="next_post_url"
                           value="{{old('next_post_url') ? old('next_post_url') : $article->next_post_url }}"/>
                    @if($errors->has('next_post_url'))
                        <span class="error"> {{$errors->first('next_post_url')}} </span>
                    @endif
                </fieldset>
                <fieldset>
                    <label for="">Показать на главной</label>
                    <input type="checkbox" name="show_post" {{ $article->show_post ? 'checked=1' : '' }} />
                </fieldset>
                <fieldset class="admin-filedsaet">
                    <label for="title">Опубликовать</label>
                    <input type="checkbox" name="published" id="published"
                            {{ $article->published ? 'checked=1' : '' }}/>
                </fieldset>
                <fieldset>
                    <label for="title">Краткое описание статьи</label>
                    <br/>
                    <br/>
                    <textarea name="short_description" id="editor2">
                {{old('short_description') ? old('short_description') : $article->short_description}}

            </textarea>
                    @if($errors->has('short_description'))
                        <span class="error"> {{$errors->first('short_description')}} </span>
                    @endif

                </fieldset>

                <fieldset>
                    <label for="title">Текст статьи</label>
                    <br/>
                    <br/>
                    <textarea name="description" id="editor1">
                {{old('description') ? old('description') : $article->description}}

            </textarea>
                    @if($errors->has('description'))
                        <span class="error"> {{$errors->first('description')}} </span>
                    @endif

                </fieldset>


                <button type="submit">Сохранить</button>


            </fieldset>
        </form>
        <script>
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            };
            var editor2 = CKEDITOR.replace('editor1', options);
            var editor1 = CKEDITOR.replace('editor2', options);
        </script>
    </div>
@endsection