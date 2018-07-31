<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    protected $fillable = [

        'name',
        'published',
        'slug',


    ];


    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
