<?php

namespace App\Http\Requests\Admin\Users;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UsersIndexRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', User::class);
    }

    public function rules()
    {
        return [];
    }
}