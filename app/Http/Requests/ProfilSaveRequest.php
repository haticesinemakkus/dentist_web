<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilSaveRequest extends FormRequest
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
        $rules =  [
            'name'=>'required|min:2|max:80',
            'surname'=>'required|min:2|max:80',
            'email'=>'required|email|min:10|max:191|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'phone'=>'required',
        ];

        if(!is_null($this->new_password)  || !is_null($this->new_password2)){
            $rules['new_password'] = 'required|min:6|max:191';
            $rules['new_password2'] = 'required|min:6|max:191|same:new_password';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'=>'Ad boş geçilemez',
            'name.min'=>'Ad minimum 2 karakter olmalıdır.',
            'name.max'=>'Ad maksimum 80 karakter olmalıdır.',
            'surname.required'=>'Soyad boş geçilemez',
            'surname.min'=>'Soyad minimum 2 karakter olmalıdır.',
            'surname.max'=>'Soyad maksimum 80 karakter olmalıdır.',
            'email.required'=>'E-mail boş geçilemez',
            'email.min'=>'E-mail minimum 10 karakter olmalıdır.',
            'email.max'=>'E-mail maksimum 191 karakter olmalıdır.',
            'email.email'=>'E-mail adresini kontrol ediniz.',
            'phone.required'=>'Telefon boş geçilemez',
            'new_password2.required'=>'Şifre boş geçilemez',
            'new_password2.min'=>'Şifre minimum 6 karakter olmalıdır.',
            'new_password2.max'=>'Şifre maksimum 191 karakter olmalıdır.',
            'new_password.required'=>'Şifre boş geçilemez',
            'new_password.min'=>'Şifre minimum 6 karakter olmalıdır.',
            'new_password.max'=>'Şifre maksimum 191 karakter olmalıdır.',
            'new_password2.same'=>'Şifre tekrarı uyuşmuyor',
        ];
    }
}
