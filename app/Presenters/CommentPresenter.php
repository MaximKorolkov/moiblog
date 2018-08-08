<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class CommentPresenter extends Presenter
{
    public function card()
    {
        return [
            'id' => $this->entity->id,
            'body' => $this->entity->body,
            'userThumbImage' => $this->entity->user->thumbImage,
            'userUrl' => action('UserController@index', $this->entity->user->id),
            'userName' => $this->entity->user->name,
            'date' => $this->entity->created_at->Format('d-F-y-hms'),
            'answerUrl' => action('CommentController@createComment', [
                'article' => $this->entity->article->id
            ]),
            'canAnswer' => auth()->check(),
        ];
    }
}