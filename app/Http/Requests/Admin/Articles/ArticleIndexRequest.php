<?php


namespace App\Http\Requests\Admin\Articles;


use App\Article;
use Illuminate\Foundation\Http\FormRequest;

class ArticleIndexRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('read' , Article::class);
    }
    public function rules()
    {
        return [];
    }

}