<?php

namespace App\Http\Resources\API\V1\NeighbourType;

use Illuminate\Http\Resources\Json\JsonResource;

class NeighbourTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
