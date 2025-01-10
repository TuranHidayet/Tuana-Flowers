<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FloristRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'florist_avatar' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:1024',
            'email' => 'required|email|unique:florists,email,' . $this->route('id'),
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ];
    }
}
