<?php

namespace App\Http\Requests\Admin\Articles;


use App\Article;
use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->can('update' , Article::class);
    }
    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'header_h1' =>'string|max:200',
            'description_short' => 'string|max:500',
            'description' => 'required|string'


        ];
    }

}