<div class="article__comment__view">
@foreach($comments as $comment)
    <div class="comment">
        <div class="comment_head">
        <img  src="{{ $comment->user->thumbImage }}" alt="">
        <a href="{{ action('UserController@index', $article->user->id)}}">{{ $comment->user->name }}</a>
        <time datetime="{{$comment->created_at}}">{{$comment->created_at->Format('d-F-y-hms')}}</time>
        </div>
        <div class="comment__body" data-id="{{ $comment->id }}" data-url="{{ action('CommentController@createComment', [
                'article' => $comment->article->id
            ]) }}">
            <p> {{ $comment->body }} </p>
            @if(auth()->user())
            <button style="color: #000000;" id="answer-comment"s>Ответить</button>
            @endif
        </div>
    </div>
@endforeach
</div>
<div class="article__comment">
@if(auth()->user())
    <form id="create-comment-form" method="post" action="{{ action('CommentController@createComment', $article)  }}">
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

<script>
    (function() {
        $('document').ready(function() {
            let $comments = $('.comment');
            let $answerButton = $comments.find('#answer-comment');
            $answerButton.on('click', function() {
               showAnswerForm($(this))
            });
            $('#create-comment-form').on('submit', (event) => {
                event.preventDefault();

                bind($(event.currentTarget), (data) => {
                    render($('.article__comment__view'), data);
                    showAnswerForm($('.article__comment__view').find('#answer-comment'));
                });
            });
            function showAnswerForm($button) {
                let $parent = $button.parents('.comment__body');
                $comments.find('#answer-form').remove();
                $parent.append(`
                    <form id="answer-form" action="${$parent.data('url')}" method="post">
                        <fieldset id="answer">
                            <label for="Ответ"></label>
                            <input type="hidden" value="${$parent.data('id')}" name="parent_id">
                            <textarea name="body" id="" cols="30" rows="5"></textarea>
                            <button type="submit">Send</button>
                        </fieldset>
                    </form>
                `);
                bind($parent.find("#answer-form"), function(data) {
                    $parent.find('#answer-form').remove();
                    render($parent, data)
                });
            }
            function render($container, data) {
                $container.append(`
                        <div class="comment">
                            <div class="comment_head">
                                <img  src="${data.userThumbImage}" alt="">
                                <a href="${data.userUrl}">${data.userName}</a>
                                <time datetime="${data.date}">${data.date}</time>
                            </div>
                            <div class="comment__body" data-id="${data.id}" data-url="${data.answerUrl}">
                            <p>${data.body}</p>
                                <button style="color: #000000;" id="answer-comment">Ответить</button>
                            </div>
                        </div>
                    `);
            }
            function bind($form, callable) {
                $form.on('submit', function(event) {
                    event.preventDefault();

                    let data = {};

                    $(this).find('input:not([type="submit"]), textarea, [type="hidden"]').each(function() {
                        data[$(this).attr('name')] = $(this).val();
                    });

                    $.ajax({
                        method: $form.attr('method'),
                        url: $form.attr('action'),
                        data: data
                    }).done(function(data) {
                        callable(data);
                    });
                });
            }
        });
    })();
</script>


