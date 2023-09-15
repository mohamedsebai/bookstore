<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'image'   => ['mimes:jpg,png,jif,jpeg', 'max:5000', 'dimensions:min_width=100,min_height=100'],
            'title' => 'required|max:50',
            'descreption' => 'required|max:200',
            'auther' => 'required|max:20',
            'price' => 'required|int',
            'discount' => 'required|int',
            'quantity' => 'required|int',
            'product_code' => 'required|int',
            'pages_num' => 'required|int'
        ];
    }
}
