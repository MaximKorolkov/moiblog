@foreach($comments as $comment)
    <h4>{{ $comment->name }}</h4>
    <div>{{ $comment->body }}</div>
@endforeach
@if(auth()->user())
    <form method="POST" action="{{  action('CommentController@createComment', $article)  }}">
        {{csrf_field()}}
        <fieldset>
        <label for="name">Имя</label>
        <input type="text" name="name" id="name" />
        </fieldset>
        <fieldset>
            <label for="body">Комментарий</label>
            <textarea name="body" id="body" cols="40" rows="5"></textarea>
        </fieldset>

        <button type="submit">Отправить</button>
    </form>
@endif



