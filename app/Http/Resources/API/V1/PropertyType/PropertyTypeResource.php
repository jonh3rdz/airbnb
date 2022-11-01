<?php

namespace App\Http\Resources\API\V1\PropertyType;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'icon_image' => $this->icon_image,
            //'status' => $this->status,
            'created_at' => $this->published_at,
            /*'author' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],*/
        ];
    }
}
