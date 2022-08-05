<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:5000', 'max:100000'],
            'stockAmount' => ['required', 'numeric', 'min:1', 'max:100'],
            'referenceNumber' => ['required', 'string', 'max:255'],
            'iva' => ['required', 'numeric', ' min:1', 'max:100'],
            'image' => ['required', 'max:5000', 'dimensions:width=1338,height=714', 'mimes:jpeg,png,jpg'],
            'category_id' => ['required', 'numeric', 'min:1', 'max:5']
        ];
    }

}
