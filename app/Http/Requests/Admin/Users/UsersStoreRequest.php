<?php

namespace App\Http\Requests\Admin\Users;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UsersStoreRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', User::class);
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:150|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:25',
            'role' => 'required|exists:roles,name'
        ];
    }
}