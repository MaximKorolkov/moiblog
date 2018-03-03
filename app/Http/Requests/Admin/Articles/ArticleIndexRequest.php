<?php


namespace App\Http\Requests\Admin\Articles;


use Illuminate\Foundation\Http\FormRequest;

class ArticleIndexRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->id === 1;
    }
    public function rules()
    {
        return [];
    }

}