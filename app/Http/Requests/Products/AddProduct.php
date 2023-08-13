<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class AddProduct extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:product',
            'price' => 'required|numeric|gt:0',
            'description' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'category_id' => 'required|numeric|gt:0',
        ];
    }
}
