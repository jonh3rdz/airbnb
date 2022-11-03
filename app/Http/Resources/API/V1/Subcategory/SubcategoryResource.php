<?php

namespace App\Http\Resources\API\V1\Subcategory;

use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category' => [
                'category' => $this->category->title,
                'description' => $this->category->description,
            ],
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d/m/Y'),
            /*'author' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],*/
        ];
    }
}
