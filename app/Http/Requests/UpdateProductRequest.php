<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'florist_id' => 'required|exists:florists,id',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|in:active,not_active',
            'features' => 'nullable|array',
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => __('Category'),
            'florist_id' => __('Florist'),
            'product_image' => __('Product Image'),
            'name' => __('Product Name'),
            'description' => __('Description'),
            'price' => __('Price'),
            'stock' => __('Stock'),
            'features' => __('Features'),
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => __('Category seçilməlidir.'),
            'category_id.exists' => __('Seçdiyiniz category mövcud deyil.'),
            'florist_id.required' => __('Florist seçilməlidir.'),
            'florist_id.exists' => __('Seçdiyiniz florist mövcud deyil.'),
            'product_image.image' => __('Yüklənmiş fayl şəkil olmalıdır.'),
            'product_image.mimes' => __('Şəkil yalnız jpeg, png, jpg, gif formatında ola bilər.'),
            'product_image.max' => __('Şəkil maksimum 2MB ola bilər.'),
            'name.required' => __('Məhsul adı yazılmalıdır.'),
            'price.required' => __('Qiymət yazılmalıdır.'),
            'price.numeric' => __('Qiymət rəqəm olmalıdır.'),
            'price.min' => __('Qiymət 0-dan az ola bilməz.'),
            'stock.required' => __('Məhsulun aktivlik vəziyyəti seçilməlidir.'),
            'stock.in' => __('Yanlış vəziyyət dəyəri daxil edilib.'),
        ];
    }
}
