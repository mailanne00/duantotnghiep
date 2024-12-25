<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LichSuThueRequest extends FormRequest
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
    public function rules()
    {
        return [
            'user_id' => 'required|exists:tai_khoans,id',
            'gio_thue' => 'required|numeric|min:1', // Giờ thuê từ 1 đến 24
            'gia_thue' => 'required|numeric|min:0',
            'noi_dung' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'ID người chơi là bắt buộc.',
            'user_id.exists' => 'Người chơi không tồn tại.',
            'gio_thue.required' => 'Số giờ thuê là bắt buộc.',
            'gio_thue.numeric' => 'Số giờ thuê phải là số nguyên.',
            'gio_thue.min' => 'Số giờ thuê ít nhất là 1.',
            'gia_thue.required' => 'Giá thuê là bắt buộc.',
            'gia_thue.numeric' => 'Giá thuê phải là số nguyên.',
            'gia_thue.min' => 'Giá thuê ít nhất là 0.',
            'noi_dung.string' => 'Nội dung phải là chuỗi.',
            'noi_dung.max' => 'Nội dung không được vượt quá 500 ký tự.',
        ];
    }
}
