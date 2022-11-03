<?php

namespace App\Http\Requests\API\V1\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'icon_image' => 'required',
            'status',
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'El titulo es requerido.',
            'description.required'    => 'La description es requerido.',
        ];
    }
}
