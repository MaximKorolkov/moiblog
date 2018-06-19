<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends BaseModel
{
    protected $fillable =
    [
      'title',
      'description',
      'img',
      'url',
      'published' ,

    ];


}
