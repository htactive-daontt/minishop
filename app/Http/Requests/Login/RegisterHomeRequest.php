<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class RegisterHomeRequest extends FormRequest
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
            'name'  => 'required',
            'email'  => 'required|email|unique:users,email',
            'password'  => 'required',
            'address'  => 'required',
            'phone' => 'required'
        ];
    }
    public function messages() {
        return [
            'name.required'  => 'Vui lòng nhập họ tên',
            'email.required'  => 'Vui lòng nhập email',
            'email.email'  => 'Vui lòng nhập đúng định dạng email',
            'email.unique'  => 'Email này đã được sử dụng, vui lòng nhập email khác',
            'password.required'  => 'Vui lòng nhập mật khẩu',
            'address.required'  => 'Vui lòng nhập địa chỉ',
            'phone.required' => 'Vui lòng nhập số điện thoại'
        ];
    }
    
}
