<?php

namespace App\Http\Resources\API\V1\PropertyType;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyTypeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'Organization' => 'Aironb',
                'authors' => [
                    'Jonh Rdz'
                ]
            ],
            'type' => 'Properties Types'
        ];
    }
}
