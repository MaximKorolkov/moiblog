<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ThreadShowRequest extends FormRequest
{
    public function authorize()
    {
        foreach ($this->route('thread')->users as $user) {
            if ($user->id === $this->user()->id) {
                return true;
            }
        }

        return false;
    }

    public function rules()
    {
        return [];
    }
}