<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'price_per_day' => 'required|numeric|min:0',

            'type' => 'required|in:villa,apartment,house,studio',

            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',

            'rooms' => 'nullable|integer|min:1',

            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',

            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}