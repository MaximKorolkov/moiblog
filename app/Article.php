<?php

namespace App;

use App\Presenters\ArticlePresenter;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;


class Article extends BaseModel
{
    use PresentableTrait;

    protected $presenter = ArticlePresenter::class;

    protected $fillable = [
        'user_id',
        'title',
        'header_h1',
        'short_description',
        'description',
        'meta_description',
        'meta_keywords',
        'published',
        'show_post',
        'author' ,
        'per_post',
        'general_image',
        'image',
        'width_image',
        'height_image',
        'per_post_url',
        'next_post',
        'next_post_url',
        'created_at',
        'type',
    ];

    public static $types = [
        'general',
        'second',
        'third',
        'unassigned',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function rubrics()
    {
        return $this->belongsToMany(Rubric::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function homeslider()
    {
        return $this->belongsTo(homeslider::class);
    }

}
