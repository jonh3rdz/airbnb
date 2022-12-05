<?php

namespace App\Http\Requests\API\V1\Property;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'user_id',
            'property_type_id',
            'room_type_id',
            'category_id',
            'subcategory_id',
            'country_id',
            'state_id',
            'city_id',
            'address',
            'latitude',
            'longitude',
            'accommodate_count',
            'bedroom_count',
            'bed_count',
            'bathroom_count',
            'currency_id',
            'price',
            'cover',
            'refund_type',
            'status',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required'    => 'El titulo es requerido.',
            'description.required'    => 'La description es requerido.',
        ];
    }
}
