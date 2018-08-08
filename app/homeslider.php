<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class homeslider extends Model
{
    protected $fillable =
        [
            'article_id',
            'news_id',
        ];

    public function article(){
        return $this->hasOne(Article::class);
    }
}
