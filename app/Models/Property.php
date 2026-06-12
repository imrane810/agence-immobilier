<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Property extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price_per_day',
        'type',
        'city',
        'address',
        'rooms',
        'main_image'
    ];

    // One property -> many images
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    // Many-to-many amenities
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }
}