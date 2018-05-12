<?php

namespace  App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
       
    }

    public function rules()
    {
        return [];
    }
}