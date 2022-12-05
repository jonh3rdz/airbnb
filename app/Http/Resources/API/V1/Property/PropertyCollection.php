<?php

namespace App\Http\Resources\API\V1\Property;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyCollection extends ResourceCollection
{
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
            'type' => 'Property'
        ];
    }
}
