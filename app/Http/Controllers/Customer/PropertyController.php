<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Liste des biens
     */
    public function index()
    {
        $properties = Property::with('amenities')
            ->latest()
            ->paginate(12);

        return view(
            'customer.properties.index',
            compact('properties')
        );
    }

    /**
     * Détail d'un bien
     */
    public function show(Property $property)
    {
        $property->load([
            'images',
            'amenities'
        ]);

        return view(
            'customer.properties.show',
            compact('property')
        );
    }
}