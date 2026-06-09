<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class propertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $properties = property::orderBy('title', 'desc')->paginate(15);
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        $property = new Property();
        return view('admin.properties.create', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $property = Property::create($request->all());
        return redirect()->route('admin.properties.index');
    }

    public function show(Property $property)
    {
        return view('admin.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $property->update($request->all());

        return redirect()->route('admin.properties.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Bien supprimé avec succès');
    }
}