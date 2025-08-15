<?php

namespace App\Http\Requests\ProductVariant;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ProductVariantUpdateRequest extends BaseRequest
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
        $id = $this->route('id');

        $rules = [
            'product_id' => 'required|exists:products,id',
            'name' => 'required',
            'sku' => 'required|max:255|unique:product_variants,sku,'.$id,
            'is_default' => 'required',
            'qty' => 'required',
            'status' => 'required',
        ];

        return $rules;
    }

}
