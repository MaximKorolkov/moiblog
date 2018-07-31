<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class ArticlePresenter extends Presenter
{
    public function main()
    {
        return [
            'general_image' => $this->entity->general_image,
            'slug' => $this->entity->slug,
            'type' => $this->entity->type,
            'title' => $this->entity->title,
            'height_image' => $this->entity->height_image,
            'width_image' => $this->entity->width_image,
            'short_description' => $this->entity->short_description,
            'rubrics' => $this->entity->rubrics()->orderBy('sort_id' , 'desc')->limit(1)->get(),
        ];
    }

}