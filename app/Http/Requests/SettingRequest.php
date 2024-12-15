<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'title' => 'nullable|string|max:50',
            'company_name' => 'nullable|string',
            'description' => 'nullable|string',
            'email' => 'nullable|email|max:50',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'meta_title' => 'nullable|string|max:50',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'about_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'slider_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'set_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'instagram' => 'nullable|url|max:50',
            'facebook' => 'nullable|url|max:50',
            'twitter' => 'nullable|url|max:50',
            'linkedin' => 'nullable|url|max:50',
            'whatsapp' => 'nullable|url|max:50',
            'google_map' => 'nullable|string|max:500',
        ];
    }
}
