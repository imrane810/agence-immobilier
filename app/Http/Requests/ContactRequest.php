<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name'  => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'max:255'],
            'subject'    => ['required', 'string', 'max:255'],
            'message'    => ['required', 'string', 'min:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Le prénom est obligatoire.',
            'last_name.required'  => 'Le nom est obligatoire.',
            'email.required'      => 'L\'email est obligatoire.',
            'email.email'         => 'Veuillez saisir un email valide.',
            'subject.required'    => 'Le sujet est obligatoire.',
            'message.required'    => 'Le message est obligatoire.',
            'message.min'         => 'Le message doit contenir au moins 10 caractères.',
        ];
    }
}