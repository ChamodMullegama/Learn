<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class itemRequests extends FormRequest
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
            'name' => 'required|string|max:225',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg'
        ];
    }

    public function messages(): array
    {
        return [
            // Custom messages for the 'name' field
            'name.required' => 'The product name is required.',
            'name.string'   => 'The product name must be a string.',
            'name.max'      => 'The product name cannot be more than 255 characters.',

            // Custom messages for the 'price' field
            'price.required' => 'The product price is required.',
            'price.integer'  => 'The price must be a whole number (integer).',
            'price.min'      => 'The price must be 0 or a positive number.',

            // Custom messages for the 'image' field
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpg, png, or jpeg.',
        ];
    }
}
