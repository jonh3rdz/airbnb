<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon_image',
        'status',
    ];

    protected $hidden = [
        //'id',
        'created_at',
        'updated_at'
    ];
}
