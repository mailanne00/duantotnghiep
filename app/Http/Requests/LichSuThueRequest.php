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
            'id' => 'required|exists:players,id',
            'gio_thue' => 'required|integer|min:1|max:24', // Giờ thuê từ 1 đến 24
            'noi_dung' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID người chơi là bắt buộc.',
            'id.exists' => 'Người chơi không tồn tại.',
            'gio_thue.required' => 'Số giờ thuê là bắt buộc.',
            'gio_thue.integer' => 'Số giờ thuê phải là số nguyên.',
            'gio_thue.min' => 'Số giờ thuê ít nhất là 1.',
            'gio_thue.max' => 'Số giờ thuê không vượt quá 24.',
            'noi_dung.string' => 'Nội dung phải là chuỗi.',
            'noi_dung.max' => 'Nội dung không được vượt quá 500 ký tự.',
        ];
    }
}
