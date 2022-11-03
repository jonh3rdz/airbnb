<?php

namespace App\Http\Requests\API\V1\Subcategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubcategoryRequest extends FormRequest
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
