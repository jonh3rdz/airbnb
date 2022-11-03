<?php

namespace App\Http\Requests\API\V1\State;

use Illuminate\Foundation\Http\FormRequest;

class StoreStateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'code' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'El nombre es requerido.',
            'code.required'    => 'El codigo es requerido.',
        ];
    }
}
