<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    protected $fillable=[
        'property_image',
        'property_id',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
