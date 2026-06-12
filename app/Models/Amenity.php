<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = [
        'name'
    ];

    // Many-to-many properties
    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}