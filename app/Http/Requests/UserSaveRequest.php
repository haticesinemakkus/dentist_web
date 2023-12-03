<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserSaveRequest extends FormRequest
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
        $rules=   [
            'email' => ['required','email','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix','min:3','max:100'],
            'name' => 'required|min:3',
            'surname' => 'required|min:2',
            'phone' => 'required|max:16',
            'tc' => ['required','min:11','max:11','regex:/^[0-9]+$/u'],
            'gender' =>'in:0,1,2',
            'birthday' => 'required|date|before:today',
            'is_active' =>'in:0,1',
        ];

        $unique = $this->route()->parameter('unique');
        if(is_null($unique)){
            array_push( $rules['email'],Rule::unique('users')->ignore($this->id));
            array_push( $rules['tc'],Rule::unique('users')->ignore($this->id));
            $rules['password'] = ['min:6','max:12','required'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'email.required' => 'Email adresi girilmesi gerekiyor',
            'email.email'    => 'Email formatında girmeniz gerekiyor.',
            'email.min'    => 'Email 3 karakterden az olamaz',
            'email.max'    => 'Email 100 karakterden fazla olamaz.',
            'email.regex'    => 'Email formatında girmeniz gerekiyor.',
            'name.required' => 'Ad adresi girilmesi gerekiyor',
            'email.unique' => 'Bu email daha önce kaydedilmiş',
            'name.min' => 'Ad 3 karakterden fazla olmalıdır.',
            'phone.min' => 'Ad 16 karakter olmalıdır.',
            'surname.required' => 'Soyad adresi girilmesi gerekiyor',
            'surname.min' => 'Soyad 2 karakterden fazla olmaldır.',
            'tc.required' => 'Tc Kimliğin girilmesi gerekiyor',
            'tc.min' => 'Tc Kimlik 11 karakter olmalıdır.',
            'tc.max' => 'Tc Kimlik 11 karakter olmalıdır.',
            'tc.regex' => 'Tc Kimlik 11 karakterli ve rakam olmalıdır.',
            'tc.unique' => 'Tc Kimlik önceden kaydedilmiş.',
            'gender.in' => 'Cinsiyet aralıkta olmalıdır.',
            'birthday.required' => 'Doğum tarihini girmelisiniz.',
            'birthday.date' => 'Doğum tarihini tarih formatında girmelisiniz.',
            'birthday.before' => 'Doğum tarihini daha önceki bir tarih olmalıdır.',
            'is_active' => 'Aktif veya Pasif Seçiniz.',
            'password.required' => 'Şifre girmelisiniz',
            'password.min' => 'Şifre en az 6 karakter olabilir.',
            'password.max' => 'Şifre en fazla 12 karaktergirmelisiniz',
        ];
    }

}
