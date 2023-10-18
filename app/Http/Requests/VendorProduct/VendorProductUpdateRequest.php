<?php

namespace App\Http\Requests\VendorProduct;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class VendorProductUpdateRequest extends FormRequest
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
            'image' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'max:200'],
            'category' => ['required', 'exists:categories,id'],
            'sub_category' => ['nullable'],
            'child_category' => ['nullable'],
            'brand' => ['required', 'exists:brands,id'],
            'price' => ['required', 'min:1', 'numeric'],
            'offer_price' => ['required_unless:offer_start_date,null'],
            'qty' => ['required', 'integer', 'min:1'],
            'video_link' => ['nullable', 'url'],
            'short_description' => ['required', 'max: 600'],
            'long_description' => ['required'],
            'seo_title' => ['nullable','max:200'],
            'offer_start_date' => ['nullable', 'date','after_or_equal:now'],
            'offer_end_date' => ['nullable', 'date', "after_or_equal:offer_start_date"],
            'seo_description' => ['nullable','max:250'],
            'status' => ['required', 'in:0,1']
        ];
    }
}
