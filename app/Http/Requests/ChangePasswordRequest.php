<?php

namespace App\Http\Requests;

class ChangePasswordRequest extends Request
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
            'password' => 'min:6|max:100',
            'new_password' => 'min:6|max:100',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.min' => 'Eski şifre 6 karakterden az olamaz.',
            'password.max' => 'Eski şifre 100 karakterden fazla olamaz.',
            'new_password.min' => 'Yeni şifre 6 karakterden az olamaz.',
            'new_password.max' => 'Yeni şifre 100 karakterden fazla olamaz.',
        ];
    }
}
