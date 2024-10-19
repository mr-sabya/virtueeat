<?php

namespace App\Http\Requests\Admin\Shop2;

use Illuminate\Foundation\Http\FormRequest;

class Shop2ProductImageRequest extends FormRequest
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
            'product_id' => 'required',
            'name' => 'required|string',
            'image' => 'image',
            'image_alt' => 'nullable|string',
        ];
    }
}
