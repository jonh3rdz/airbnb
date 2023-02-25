<?php

namespace App\Models\API\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_id',
        'dateini',
        'datefini',
        'total_days',
        'price_per_day',
        'price_for_stay',
        'cleaning_fee',
        'service_fee',
        'price_total',
        'status',
    ];

    //datos no enviar
    protected $hidden = [
        //'id',
        'created_at',
        'updated_at'
    ];

    //relacion a users inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //relacion a users inversa

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public static function boot(){
        parent::boot();
        static::creating(function ($property) {
            $property->user_id = Auth::id();
        });
    }
}
