<?php

namespace App\Http\Resources\API\V1\Subcategory;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SubcategoryCollection extends ResourceCollection
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
            'type' => 'Subcategories'
        ];
    }
}
