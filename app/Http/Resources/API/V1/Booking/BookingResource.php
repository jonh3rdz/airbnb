<?php

namespace App\Http\Resources\API\V1\Booking;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'dateini' => $this->dateini,
            'datefini' => $this->datefini,
            'total_days' => $this->total_days,
            'price_per_day' => $this->price_per_day,
            'price_for_stay' => $this->price_for_stay,
            'cleaning_fee' => $this->cleaning_fee,
            'service_fee' => $this->service_fee,
            'price_total' => $this->price_total,
            'status' => $this->status,
            'property_id' => $this->property_id,
            'property' => [
                'property_id' => $this->property->id,
                'name' => $this->property->name,
                'address' => $this->property->address,
                'user_id' => $this->property->user_id,
                'user' => $this->user->name,
            ],
            'author' => [
                'id' => $this->user->id,
                'user' => $this->user->name,
                'email' => $this->user->email,
            ],
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
