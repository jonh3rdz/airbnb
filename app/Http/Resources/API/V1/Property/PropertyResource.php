<?php

namespace App\Http\Resources\API\V1\Property;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            // 'Tipo de propiedad' => [
            //     'title' => $this->property_type->title,
            //     'icon_image' => $this->property_type->icon_image,
            // ],
            // 'Country' => [
            //     'name' => $this->country->name,
            //     'code' => $this->country->code,
            // ],
            // 'State' => [
            //     'name' => $this->state->name,
            //     'code' => $this->state->code,
            // ],
            // 'City' => [
            //     'City' => $this->city->name,
            // ],
            // 'address' => $this->address,
            'location' => [
                'country_id' => $this->country->id,
                'country' => $this->country->name,
                'state_id' => $this->state->id,
                'state' => $this->state->name,
                'city_id' => $this->city->id,
                'city' => $this->city->name,
                'address' => $this->address,
            ],
            'country' => [
                'country_id' => $this->country->id,
                'country' => $this->country->name,
            ],
            'state' => [
                'state_id' => $this->state->id,
                'state' => $this->state->name,
            ],
            'city' => [
                'city_id' => $this->city->id,
                'city' => $this->city->name,
            ],
            'category' => [
                'category_id' => $this->category->id,
                'title' => $this->category->title,
                'icon_image' => $this->category->icon_image,
            ],
            'subcategory' => [
                'subcategory_id' => $this->subcategory->id,
                'title' => $this->subcategory->title,
            ],
            'room_type' => [
                'room_type_id' => $this->room_type->id,
                'title' => $this->room_type->title,
                'icon_image' => $this->room_type->icon_image,
            ],
            'accommodate_count' => $this->accommodate_count,
            'bedroom_count' => $this->bedroom_count,
            'bed_count' => $this->bed_count,
            'bathroom_count' => $this->bathroom_count,
            'price' => $this->price,
            'cover' => $this->cover,
            'status' => $this->status,
            'author' => [
                'id' => $this->user->id,
                'user' => $this->user->name,
                'email' => $this->user->email,
            ],
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}