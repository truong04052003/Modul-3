<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products|max:255',
            'price' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'vui long nhap ten',
            'name.unique' => 'ten da ton tai ',
            'name.max' => 'ten qua dai',
            'price.required' => 'vui long nhap gia',
           
        ];
    }
}