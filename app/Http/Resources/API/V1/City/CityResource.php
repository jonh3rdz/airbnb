<?php

namespace App\Http\Resources\API\V1\City;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'state' => [
                'state' => $this->state->name,
                'code' => $this->state->code,
            ],
            'name' => $this->name,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d/m/Y'),
            /*'author' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],*/
        ];
    }
}
