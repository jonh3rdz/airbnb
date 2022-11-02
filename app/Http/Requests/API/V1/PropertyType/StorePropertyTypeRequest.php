<?php

namespace App\Http\Requests\API\V1\PropertyType;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
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
