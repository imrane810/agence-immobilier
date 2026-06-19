<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use Illuminate\Support\Facades\Storage;


class AdminPropertyController extends Controller
{
    /**
     * LISTE
     */
    public function index()
    {
        $properties = Property::latest()->paginate(10);

        return view('admin.properties.index', compact('properties'));
    }

    /**
     * FORM CREATE
     */
    public function create()
    {
        return view('admin.properties.create');
    }

    /**
     * STORE
     */
    public function store(StorePropertyRequest $request)
    {
        $data = $request->validated();

        // Image principale
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')
                ->store('properties/main', 'public');
        }

        $property = Property::create($data);

        // Amenities
        if ($request->filled('amenities')) {
            $property->amenities()->sync($request->amenities);
        }

        // Images multiples
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties/gallery', 'public');

                $property->images()->create([
                    'image_path' => $path
                ]);
            }
        }

     
        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Property created successfully');
    }

    /**
     * SHOW
     */
    public function show(Property $property)
    {
        $property->load(['images', 'amenities']);

        return view('admin.properties.show', compact('property'));
    }

    /**
     * FORM EDIT
     */
    public function edit(Property $property)
    {
        $property->load('amenities');

        return view('admin.properties.edit', compact('property'));
    }

    /**
     * UPDATE
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $data = $request->validated();

        // Update image principale
        if ($request->hasFile('main_image')) {

            // delete old image
            if ($property->main_image) {
                Storage::disk('public')->delete($property->main_image);
            }

            $data['main_image'] = $request->file('main_image')
                ->store('properties/main', 'public');
        }

        $property->update($data);

        // Sync amenities
        if ($request->filled('amenities')) {
            $property->amenities()->sync($request->amenities);
        } else {
            $property->amenities()->detach();
        }

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Property updated successfully');
    }

    /**
     * DELETE
     */
    public function destroy(Property $property)
    {
        // delete main image
        if ($property->main_image) {
            Storage::disk('public')->delete($property->main_image);
        }

        // delete gallery images
        foreach ($property->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $property->delete();

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Property deleted successfully');
    }
}