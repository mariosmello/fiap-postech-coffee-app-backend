<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => ["required","exists:categories,id"],
            'name' => ["required","string", "unique:products"],
            'description' => ["required","string"],
            'price' => ["required","decimal:2"],
        ];
    }
}
