<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductsUpdate extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            /*'nameproduct' => 'required',
            'idcat' => 'required',
            'price' => 'required',
            'qty'   => 'required',
            'thumbnail'   => 'required',
            'preview' => 'required',
            'detail' => 'required',*/
        ];
    }
    /*public function messages()
    {
        return [
            'nameproduct.required' => 'Vui lòng nhập tên sản phẩm',
            'nameproduct.unique' => 'Tên này đã được sử dụng',
            'idcat.required' => 'Vui lòng chọn danh mục',
            'price.required' => 'Vui lòng nhập sản phẩm',
            'qty.required'   => 'Vui lòng nhập số lượng',
            'thumbnail.required'   => 'Vui lòng chọn hình ảnh',
            'preview.required' => 'Vui lòng nhập mô tả',
            'detail.required' => 'Vui lòng chi tiết',
        ];
    }*/
}
