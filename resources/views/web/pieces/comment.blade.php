<div class="article__comment__view">
@foreach($comments as $comment)
    <img class="article__comment_avatar" src="{{ $comment->user->avatar }}" alt="">
    <a href="{{ action('UserController@index', $article->user->id)}}">{{ $comment->name }}</a>
    <div class="comment__body">{{ $comment->body }}</div>
@endforeach
</div>
<div class="article__comment">
@if(auth()->user())
    <form method="post" action="{{  action('CommentController@createComment', $article)  }}">
        {{csrf_field()}}
        <input hidden="hidden" type="text" name="name" id="name"  value="{{auth()->user()->name}}"/>
        <fieldset>
            <label class="comment__label" for="body">Комментарий</label>
            <textarea class="comment__field" name="body" id="body" cols="40" rows="5"></textarea>
        </fieldset>
        <button class="comment__submit" type="submit">Отправить</button>
    </form>
    @else
    <p>Что бы оставить комментарий <a href="{{route('login')}}">войдите</a></p>
@endif
</div>


