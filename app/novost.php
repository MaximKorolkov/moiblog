<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bool published
 * @property bool show_news
 * @property mixed text
 */
class novost extends Model
{
    protected $fillable =
        [
          'title',
          'url',
          'meta_description',
          'meta_description',
          'meta_keyword',
          'tag_h1',
          'general_image',
          'author',
          'show_image',
          'text',
          'img_width',
          'img_height',
          'show_news',
          'published',
        ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
