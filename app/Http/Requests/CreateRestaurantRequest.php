<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRestaurantRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'menu_items' => 'required|array|min:1',
            'menu_items.*.name' => 'required|string|max:255',
            'menu_items.*.description' => 'nullable|string|max:500',
            'menu_items.*.price' => 'required|numeric|min:0',
            'menu_items.*.image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
