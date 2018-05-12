<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends BaseModel
{
    protected $fillable =
    [
        'title',
        'url',
        'you_url',
        'parent_id',
        'published',
        'position' ,
    ];




}
