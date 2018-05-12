<?php

namespace App\Http\Requests\Admin\Ability;

use Illuminate\Foundation\Http\FormRequest;

class AbilityIndexRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('abilities-batch-edit');

    }

    public function rules()
    {
        return [];
    }
}