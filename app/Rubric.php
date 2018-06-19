<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bool show_image
 * @property bool published
 */
class Rubric extends BaseModel
{
    protected $fillable =
        [

            'article_id',
            'sort_id',
            'name',
            'url',
            'title',
            'meta_description',
            'meta_keywords',
            'image',
            'show_image',
            'description',
            'published'
        ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
