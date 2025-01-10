<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'shop_id' => 'required|exists:shops,id',
            'category_id' => 'required|exists:categories,id',
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
            'stock' => 'string|nullable',
        ];
    }
}
