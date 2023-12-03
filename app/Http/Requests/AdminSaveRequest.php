<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminSaveRequest extends FormRequest
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
        // if (in_array($this->method(), ['PUT', 'PATCH'])) {
        // }

       $rules = [
            'email' => ['required','email','min:3','max:191','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'title' => 'required|min:3|max:100',
            'name' => 'required|min:3|max:80',
            'surname' => 'required|min:2|max:80',
            'phone' => 'required|max:15|min:15',
            'tc' => 'required|min:11|max:11|regex:/^[0-9]+$/u',
            'is_active' =>'in:0,1',
        ];

        $unique = $this->route()->parameter('unique');
        if(is_null($unique)){
            array_push( $rules['email'],Rule::unique('admin')->ignore($this->id));
            $rules['password'] = ['min:6','max:12','required'];
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'email.required' => 'Email adresi girilmesi gerekiyor',
            'email.email'    => 'Email formatında girmeniz gerekiyor.',
            'email.min'    => 'Email 3 karakterden fazla olmalıdır.',
            'email.email'    => 'Email formatında girmeniz gerekiyor.',
            'email.regex'    => 'Email formatında girmeniz gerekiyor.',
            'email.unique'    => 'Email daha önce kaydedilmiş',
            'name.required' => 'Ad adresi girilmesi gerekiyor',
            'name.min' => 'Ad 3 karakterden fazla olmalıdır.',
            'name.max' => 'Ad maximum 100 karakter olmalıdır.',
            'surname.required' => 'Soyad adresi girilmesi gerekiyor',
            'surname.min' => 'Soyad 2 karakterden fazla olmaldır.',
            'surname.max' => 'Soyad maximum 80 karakter olmaldır.',
            'title.required' => 'Ünvan adresi girilmesi gerekiyor',
            'title.min' => 'Ünvan 3 karakterden fazla olmalıdır.',
            'title.max' => 'Ünvan 3 karakterden fazla olmalıdır.',
            'phone.min' => 'Telefon 11 karakter olmalıdır.',
            'phone.max' => 'Telefon 11 karakter olmalıdır.',
            'tc.required' => 'Tc Kimliğin girilmesi gerekiyor',
            'tc.min' => 'Tc Kimlik 11 karakter olmalıdır.',
            'tc.max' => 'Tc Kimlik 11 karakter olmalıdır.',
            'tc.regex' => 'Tc Kimlik 11 karakterli ve rakam olmalıdır.',
            'is_active' => 'Aktif veya Pasif Seçiniz.',
            'password.required' => 'Şifre girmelisiniz.',
            'password.min' => 'Şifre en az 6 karakter olabilir.',
            'password.max' => 'Şifre en fazla 12 karakter olabilir.',
        ];
    }


}
