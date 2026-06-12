<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
class AmenityProperty extends Pivot
{
    protected $table = 'amenity_property';

    public $timestamps = false;
}