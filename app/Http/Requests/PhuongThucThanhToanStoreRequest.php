<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhuongThucThanhToanStoreRequest extends FormRequest
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
            'ten_phuong_thuc' => 'required|max:255',
            'mo_ta' => 'required|max:255',
            'so_tai_khoan' => 'required|integer',
            'logo' => 'required|mimes:png,jpg,svg|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'ten_phuong_thuc.required' => 'Tên phương thức không được để trống',
            'ten_phuong_thuc.max' => 'Tên phương thức không được quá 255 ký tự',
            'mo_ta.required' => 'Mô tả không được để trống',
            'mo_ta.max' => 'Mô tả không được quá 255 ký tự',
            'so_tai_khoan.required' => 'Số tài khoản không được để trống',
            'so_tai_khoan.integer' => 'Số tài khoản bắt buộc là số',
            'logo.required' => 'Logo không được để trống',
            'logo.mimes' => 'Logo bắt buộc là ảnh',
            'logo.max' => 'Logo không được quá 10Mb',
        ];
    }
}
