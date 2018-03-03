<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
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
