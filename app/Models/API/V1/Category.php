<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon_image',
        'status',
    ];

    protected $hidden = [
        //'id',
        'created_at',
        'updated_at'
    ];
}
