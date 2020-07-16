<?php

namespace App\Http\Requests\ShoppingCart;

use App\Rules\ShoppingCartQty;
use Illuminate\Foundation\Http\FormRequest;

class ShoppingCartCreate extends FormRequest
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
            'qty'   => ['required', 'numeric', 'gt:0', new ShoppingCartQty($this->route('id'), $this->get('qty'))]
        ];
    }
    public function messages()
    {
        return [
            'qty.required'   => 'Vui lòng nhập số lượng',
            'qty.numeric'   => 'Vui lòng sô',
            'qty.gt'   => 'Số lượng phải lớn hơn 0'
        ];
    }
}
