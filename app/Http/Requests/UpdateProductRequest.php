<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $productId = request()->route('product')->id;
        return [
            'category_id' => ["required","exists:categories,id"],
            'name' => ["required","string", "unique:products,id,{$productId}"],
            'description' => ["required","string"],
            'price' => ["required","decimal:2"],
        ];
    }
}
