<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 03.02.18
 * Time: 16:33
 */

namespace App\Http\Requests\Admin\Articles;


use Illuminate\Foundation\Http\FormRequest;

class ArticleEditRequest extends FormRequest
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