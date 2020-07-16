<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesCreate extends FormRequest
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
            'namecat'   => 'required|unique:categories,name',
        ];
    }
    public function messages()
    {
        return [
            'namecat.required'   => 'Vui lòng nhập tên danh mục',
            'namecat.unique'   => 'Tên này đã được sử dụng'
        ];
    }
}
