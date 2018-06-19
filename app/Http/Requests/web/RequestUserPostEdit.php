<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class RequestUserPostEdit extends FormRequest
{
    public function authorize()
    {
        return $this->user()->id === $this->route('user')->id;
    }

    public function rules()
    {
        return [];
    }
}