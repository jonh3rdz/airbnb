<?php

namespace App\Http\Resources\API\V1\Amenity;

use Illuminate\Http\Resources\Json\JsonResource;

class AmenityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'icon_image' => $this->icon_image,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d/m/Y'),
            /*'author' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],*/
        ];
    }
}
