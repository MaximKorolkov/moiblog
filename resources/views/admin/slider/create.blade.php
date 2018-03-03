@extends('admin.layout')

@section('content')
    <div class="container">
        <form action="{{ action('Admin\SliderController@store' )  }}" method="post" class="form-horizontal">
            {{ csrf_field()  }}
            <fieldset>
                <label for="title">Название слайда</label>
                <input id="title" type="text" name="title" />
            </fieldset>
            <fieldset>
                <label for="img">Картинка слайда</label>
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Dыбрать изображение поста
                    </a>
                    <input id="thumbnail" class="form-control" type="text" name="img">
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                <script>$('#lfm').filemanager('image');</script>
            </fieldset>
            <fileset>
                <label for="url">Ссылка слайда</label>
                <input id="url" type="text" name="url" />
            </fileset>
            <fileset>
                <label for="published">Опубликовать слайд</label>
                <input type="checkbox" name="published">
            </fileset>
            <fieldset>
                <label for="description">Надпись на слайдере</label>
                <textarea name="description" id="" cols="30" rows="10">
                     {{old('description') }}
                </textarea>
            </fieldset>
            <button type="submit">Сохранить</button>
        </form>
    </div>
@endsection