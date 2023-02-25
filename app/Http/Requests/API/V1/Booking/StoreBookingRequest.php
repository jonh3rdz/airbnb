<?php

namespace App\Http\Requests\API\V1\Booking;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'user_id',
            'property_id',
            'dateini',
            'datefini',
            'total_days',
            'price_per_day',
            'price_for_stay',
            'cleaning_fee',
            'service_fee',
            'price_total',
            'status',
        ];
    }
    
    public function messages()
    {
        return [
            'dateini.required'    => 'La fecha de inicio es requerido.',
            'datefini.required'    => 'La fecha final es requerido.',
        ];
    }
}
