<?php

namespace App\Http\Requests\API\V1\Property;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'user_id' => 'exists:users,id',
            'property_type_id' => 'required|exists:property_types,id',
            'room_type_id' => 'required|exists:room_types,id',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|max:255',
            'latitude' => '',
            'longitude' => '',
            'accommodate_count' => 'required|integer|min:1',
            'bedroom_count' => 'required|integer|min:1',
            'bed_count' => 'required|integer|min:1',
            'bathroom_count' => 'required|integer|min:1',
            'currency_id' => '',
            'price' => 'required|numeric|min:0',
            'cover' => 'required|image|max:2048',
            'refund_type' => '',
            'status' => '',
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
            'exists' => 'El valor seleccionado para :attribute no es válido.',
            'numeric' => 'El campo :attribute debe ser numérico.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'min' => 'El valor mínimo permitido para :attribute es :min.',
            'image' => 'El archivo seleccionado para :attribute debe ser una imagen.',
            'in' => 'El valor seleccionado para :attribute no es válido.',
        ];
    }
}
