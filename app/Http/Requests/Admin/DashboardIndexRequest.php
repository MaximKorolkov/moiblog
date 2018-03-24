<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DashboardIndexRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('dashboard');
    }

    public function rules()
    {
        return [];
    }
}