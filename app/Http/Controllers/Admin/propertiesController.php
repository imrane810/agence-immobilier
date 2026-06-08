<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\properties;
use Illuminate\Http\Request;
use Illuminate\View\View;

class propertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.properties.index', [
            'properties' => properties::orderBy('title', 'desc')->paginate(15) 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('admin.properties.form', [
            // 'property' => new Property()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}