<?php

namespace App\Http\Requests\Admin\Users;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UsersEditRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', User::class);
    }

    public function rules()
    {
        return [];
    }
}