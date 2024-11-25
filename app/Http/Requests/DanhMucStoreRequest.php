<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucStoreRequest extends FormRequest
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
            'ten' => 'required|unique:danhmuc,ten|max:255',
            'anh' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'ten.required' => 'Không được để trống danh mục',
            'ten.unique' => 'Tên danh mục đã tồn tại',
            'ten.max' => 'Tên danh mục không được quá 255 ký tự',
            'anh.required' => 'Không được để trống ảnh',
            'anh.mimes' => 'File không hợp lệ',
            'anh.max' => 'Không được quá 10MB',
        ];
    }
}
