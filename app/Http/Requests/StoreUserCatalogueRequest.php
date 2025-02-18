<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserCatalogueRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'description' => 'required|string',
            // Thêm các quy tắc xác thực khác nếu cần
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '• Bạn chưa nhập tên',
            'description.required' => '• Bạn chưa nhập mô tả',
            // Thêm các thông báo lỗi khác nếu cần
        ];
    }
}
