<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'delivery_address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'notes' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Məhsul seçimi vacibdir.',
            'product_id.exists' => 'Seçilən məhsul mövcud deyil.',
            'quantity.required' => 'Məhsul miqdarı qeyd olunmalıdır.',
            'delivery_address.required' => 'Çatdırılma ünvanı qeyd olunmalıdır.',
            'phone.required' => 'Əlaqə nömrəsi qeyd olunmalıdır.',
        ];
    }
}
