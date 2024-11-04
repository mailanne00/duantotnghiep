<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucUpdateRequest extends FormRequest
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
            'ten' => 'required|max:50|unique:danh_mucs,ten',
            'anh_dai_dien' => 'mimes:png,jpg,svg|max:10240'
        ];
    }
    public function messages(): array
    {
        return [
            'ten.required' => 'Không được để trống',
            'ten.unique' => 'Tên danh mục đã tồn tại',
            'ten.max' => 'Không được quá 50 ký tự',
           
            'anh_dai_dien.mimes' => 'Bắt buộc phải là ảnh',
            'anh_dai_dien.max' => 'Không được quá 10MB'
        ];
    }
}
