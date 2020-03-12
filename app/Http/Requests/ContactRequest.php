<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'phone_email' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phone_email.required' => 'Vui lòng nhập số điện thoại hoặc email',
            'content.required' => 'Vui lòng nhập nội dung'
        ];
    }
}
