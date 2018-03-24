<?php

namespace App\Http\Requests\Admin\Roles;

use Illuminate\Foundation\Http\FormRequest;
use Silber\Bouncer\Database\Role;

class RolesEditRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', Role::class);
    }

    public function rules()
    {
        return [];
    }
}