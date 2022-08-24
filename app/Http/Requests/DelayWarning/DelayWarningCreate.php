<?php

namespace App\Http\Requests\DelayWarning;

use Illuminate\Foundation\Http\FormRequest;

class DelayWarningCreate extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
        ];
    }

    public function attributes()
    {
        return  [];
    }
}
