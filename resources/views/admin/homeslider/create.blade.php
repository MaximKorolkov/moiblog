@extends('admin.layout')

@section('content')

    <h2>Выберите статью </h2>
    <form action="{{action('Admin\HomesliderController@store')}}" method="post">
    <fieldset class="homeslider-article">
        <label for="article">Статьи</label>
        @foreach($articles as $article)
            <input type="checkbox" name="article_id" value="{{ $article->id  }}" id="article" />
            <label for=""> {{  $article->name }} </label>
        @endforeach>
    </fieldset>
        <input type="submit" value="OK">
    </form>


@endsection