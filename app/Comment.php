<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =
        [
            'name',
            'body',
            'parent_id',
            'article_id',
        ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
