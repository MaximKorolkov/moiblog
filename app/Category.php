<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    protected $fillable = [

        'name',
        'slug',


    ];


    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
