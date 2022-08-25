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
            'section' => 'required|sometimes|nullable|string',
            'day' => 'sometimes|nullable|string',
            'date' => 'required|sometimes|nullable|string',
            'hour' => 'sometimes|nullable|string',
            'student_signature' => 'sometimes|nullable|string',
            'parent_phone' => 'sometimes|nullable|string',
            'parent_statement' => 'sometimes|nullable|string',
        ];
    }

    public function attributes()
    {
        return  [];
    }
}
