<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

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
            'name' => 'nullable|string|max:50',
            'email' => 'required|email|max:50',
            'subject'=> 'nullable|string|max:100',
            'message'=> 'nullable|string|max:255',
            'status'=> 'nullable|boolean',
        ];
    }
}
