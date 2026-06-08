<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class propertiesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'price_per_day' => 'required|numeric|min:0',

            'type' => 'required|in:villa,appartment,house,studio',

            'surface_area' => 'nullable|integer|min:1',

            'rooms' => 'nullable|integer|min:0',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',

            'furnished' => 'nullable|boolean',

            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',

            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',

            'availability_status' => 'nullable|in:available,rented,reserved',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'floor' => 'nullable|integer|min:0',

            'has_elevator' => 'nullable|boolean',
            'has_parking' => 'nullable|boolean',

            'security_deposit' => 'nullable|numeric|min:0',
        ];
    }
}