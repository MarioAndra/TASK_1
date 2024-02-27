<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestProduct extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>'required|min:2|max:15',
            'price'=>'required|numeric|min:100',
            'category_id'=>'required',
            'user_id'=>'required',
            'images' => 'required|array|min:2',
            'images.*' => 'required|image|mimes:jpg,png,gif|max:2764800|dimensions:max_width=3840,max_height=2160'
        ];
    }
}
