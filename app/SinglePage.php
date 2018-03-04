<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bool published
 * @property bool add_menu
 */
class SinglePage extends Model
{

    protected $fillable =
        [
            'title',
            'url',
            'meta_description',
            'meta_keyword',
            'tag_h1',
            'content',
            'published',
            'add_menu'

        ];


}
