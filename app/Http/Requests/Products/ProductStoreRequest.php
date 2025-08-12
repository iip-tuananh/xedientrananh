<?php

namespace App\Http\Requests\Products;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends BaseRequest
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
            'name' => 'required|unique:products,name',
            'code' => 'required|unique:products,code',
            // 'cate_id' => 'required_if:type,0|exists:categories,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'origin_id' => 'nullable|exists:origins,id',
            'intro' => 'nullable',
            'short_des' => 'nullable',
            'body' => 'nullable',
            'base_price' => 'nullable|integer',
            'price' => 'nullable|integer',
            'status' =>'required|in:0,1',
//            'image' => 'required|file|mimes:jpg,jpeg,png|max:3000',
            'galleries' => 'nullable|array|min:1|max:20',
            'galleries.*.image' => 'nullable|file|mimes:png,jpg,jpeg|max:10000',
            'post_ids' => 'nullable|array|max:5',
            'videos' => 'nullable|array',
            'gift' => 'required_if:button_type,1',

            'attrs' => 'nullable|array',
            'attrs.*.values.*.value' => 'required',
        ];

        if($this->input('type') == 0) {
            $rules['cate_id'] = 'required|exists:categories,id';
        }


        if($this->input('base_price') > 0) {
            $rules['base_price'] = 'nullable|integer|min:' . $this->input('price');
        }


        $videoInput = $this->get('videos');

        if(($videoInput)) {
            foreach ($videoInput as $key => $video) {
                $rules['videos.'.$key.'.'.'link']   = 'required';
                $rules['videos.'.$key.'.'.'video']   = 'required';
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'aff_link.url' => 'Link affiliate không hợp lệ',
            'short_link.url' => 'Link rút gọn không hợp lệ',
            'origin_link.url' => 'Link gốc không hợp lệ',
            'base_price.min' => 'Giá trước giảm không được nhỏ hơn giá bán',
        ];
    }
}
