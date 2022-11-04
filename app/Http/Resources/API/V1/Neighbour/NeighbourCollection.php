<?php

namespace App\Http\Resources\API\V1\Neighbour;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NeighbourCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
