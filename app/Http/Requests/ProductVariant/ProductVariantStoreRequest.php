<?php

namespace App\Http\Requests\ProductVariant;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ProductVariantStoreRequest extends BaseRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'product_id' => 'required|exists:products,id',
            'name' => 'required',
            'sku' => 'required|max:255|unique:product_variants,sku',
            'is_default' => 'required',
            'qty' => 'required',
            'status' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png,webp|max:3000',
        ];

        return $rules;
    }

}
