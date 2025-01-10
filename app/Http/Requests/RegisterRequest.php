<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'nullable|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|string|min:4',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Ad sahəsi doldurulmalıdır.',
            'email.required' => 'Email sahəsi doldurulmalıdır.',
            'password.required' => 'Şifrə sahəsi doldurulmalıdır.',
        ];
    }
}
