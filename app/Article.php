<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{

    protected $fillable = [
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


}
