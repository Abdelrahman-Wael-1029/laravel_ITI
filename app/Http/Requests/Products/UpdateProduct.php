<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'name' => 'required|string|max:255|unique:product,name,'.$this->id,
            'price' => 'required|numeric|gt:0',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:4096',
            'category_id' => 'required|numeric|gt:0',   
        ];
    }
}
