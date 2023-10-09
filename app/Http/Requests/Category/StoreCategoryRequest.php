<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'icon' => ['required', 'not_in:empty'],
            'name' => ['required', 'max:200', 'unique:categories,name'],
            'status' => ['required', 'in:0,1']
        ];
    }

    public function messages()
    {
        return [
            'icon.not_in' => 'The :attribute field is not empty value'
        ];

    }
}
