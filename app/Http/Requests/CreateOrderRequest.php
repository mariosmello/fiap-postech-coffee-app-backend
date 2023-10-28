<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => ["exists:users,id"],
            'products' => ["required","array"],
            'products.*.id' => ["required","exists:products,id"],
            'products.*.qty' => ["required","integer"],
        ];
    }
}
