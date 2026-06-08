<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Properties extends Model
{
    use HasFactory;

    protected $table = 'properties';
    
    protected $fillable = [
        'title',
        'description',

        'price_per_day',

        'type',

        'surface_area',

        'rooms',
        'bedrooms',
        'bathrooms',

        'furnished',

        'address',
        'city',

        'latitude',
        'longitude',

        'availability_status',

        'image',

        'floor',

        'has_elevator',
        'has_parking',

        'security_deposit',
    ];

    protected $casts = [
        'price_per_day' => 'decimal:2',
        'surface_area' => 'integer',

        'rooms' => 'integer',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'floor' => 'integer',

        'furnished' => 'boolean',
        'has_elevator' => 'boolean',
        'has_parking' => 'boolean',

        'latitude' => 'float',
        'longitude' => 'float',

        'security_deposit' => 'decimal:2',
    ];

    const STATUS_AVAILABLE = 'available';
    const STATUS_RENTED = 'rented';
    const STATUS_RESERVED = 'reserved';

    const TYPE_VILLA = 'villa';
    const TYPE_APPARTMENT = 'appartment';
    const TYPE_HOUSE = 'house';
    const TYPE_STUDIO = 'studio';
}