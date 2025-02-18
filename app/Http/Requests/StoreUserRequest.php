<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|string|email|unique:users|max:191',
            'name' => 'required|string',
            'user_catalogue_id' => 'required|integer|gt:0',
            'password' => 'required|string|min:6',
            're_password' => 'required|string|same:password',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '• Bạn chưa nhập Email',
            'email.email' => '• Cần nhập đúng định dạng Email vd: abc@gmail.com',
            'email.unique' => '• Email đã tồn tại',
            'email.string' => '• Email phải là dạng ký tự',
            'email.max' => '• Độ dài Email không quá 191 ký tự',
            'name.required' => '• Bạn chưa nhập Họ và tên',
            'name.max' => '• Độ dài Họ và tên không quá 191 ký tự',
            'name.string' => '• Họ và tên phải là dạng ký tự',
            'user_catalogue_id.required' => '• Bạn chưa chọn Loại người dùng',
            'user_catalogue_id.gt' => '• Bạn chưa chọn Loại người dùng',
            'password.min' => '• Mật khẩu phải có ít nhất 6 ký tự',
            're_password.required' => '• Bạn cần nhập lại Mật khẩu',
            're_password.same' => '• Mật khẩu không trùng khớp',
            'password.required' => '• Bạn chưa nhập Mật khẩu',
        ];
    }
}
