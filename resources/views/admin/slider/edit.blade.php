@extends('admin.layout')

@section('content')
    <div class="container">
        <form action="{{ action('Admin\SliderController@update' , $sliders->id )  }}" method="post" class="form-horizontal">
            {{ csrf_field()  }}
            <fieldset>
                <label for="title">Название слайда</label>
                <input id="title" type="text" name="title" value="{{old('title') ? old('title') : $sliders->title}}"/>
            </fieldset>
            <fieldset>
                <label for="img">Картинка слайда</label>
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Выбрать изображение поста
                </a>
                <input type="text" name="img" id="thumbnail" class="form-control" value="{{$sliders->img}}" />
                <img src="{{$sliders->img}}" id="holder" style="margin-top:15px;max-height:100px;" />
                <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                <script>$('#lfm').filemanager('image');</script>
            </fieldset>
            <fileset>
                <label for="url">Ссылка слайда</label>
                <input id="url" type="text" name="url" value="{{old('url') ? old('url') : $sliders->url}}" />
            </fileset>
            <fileset>
                <label for="published">Опубликовать слайд</label>
                <input type="checkbox" name="published" {{ $sliders->published ? 'checked=1' : '' }}>
            </fileset>
            <fieldset>
                <label for="description">Надпись на слайдере</label>
                <textarea name="description" id="" cols="30" rows="10">
                     {{old('description') ? old('description') : $sliders->description}}
                </textarea>
            </fieldset>
            <button type="submit">Сохранить</button>
        </form>
    </div>
@endsection