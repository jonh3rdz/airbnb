<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
        'name',
        'status',
    ];

    protected $hidden = [
        //'id',
        'created_at',
        'updated_at'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
