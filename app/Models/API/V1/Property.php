<?php

namespace App\Models\API\V1;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'property_type_id',
        'room_type_id',
        'category_id',
        'subcategory_id',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'latitude',
        'longitude',
        'accommodate_count',
        'bedroom_count',
        'bed_count',
        'bathroom_count',
        'currency_id',
        'price',
        'cover',
        'refund_type',
        'status',
    ];

    //datos no enviar
    protected $hidden = [
        //'id',
        'created_at',
        'updated_at'
    ];

    public function getPublishedAtAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    //relacion a users inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relacion a property_types inversa
    public function property_type(){
        return $this->belongsTo(PropertyType::class);
    }

    //relacion a room_types inversa
    public function room_type(){
        return $this->belongsTo(RoomType::class);
    }

    //relacion a categories inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //relacion a subcategories inversa
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    //relacion a countries inversa
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    //relacion a states inversa
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    //relacion a cities inversa
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function PropertyImage(){
        return $this->hasMany(PropertyImage::class);
    }

    public static function boot(){
        parent::boot();
        static::creating(function ($property) {
            $property->user_id = Auth::id();
        });
    }
}
