<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =
        [
            'body',
            'parent_id',
            'article_id',
            'user_id'
        ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
