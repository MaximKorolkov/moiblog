<?php

namespace App;

use App\Presenters\CommentPresenter;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Laracasts\Presenter\PresentableTrait;

class Comment extends Model
{
    use NodeTrait;

    use PresentableTrait;

    protected $presenter = CommentPresenter::class;

    protected $fillable = [
        'body',
        'parent_id',
        'article_id',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
