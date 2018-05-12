<?php

namespace App\Http\Requests\Admin\Users;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UsersDestroyRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('delete', User::class);
    }

    public function rules()
    {
        return [];
    }
}