<?php

namespace App\Http\Requests\Admin\Roles;


use Illuminate\Foundation\Http\FormRequest;
use Silber\Bouncer\Database\Role;

class RolesStoreRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', Role::class);
    }

    public function rules()
    {
        return [
            'name' => 'required|regex:/^[a-zA-Z0-9_-]*$/|max:255|unique:roles,name',
            'title' => 'required|string|max:255',
        ];
    }
}