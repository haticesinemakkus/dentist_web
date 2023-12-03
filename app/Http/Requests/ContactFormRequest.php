<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name' => 'required|min:4',
            'phone' => 'required|min:12|max:12',
            'email' => 'required|email',
            'message' => 'required|min:20|max:400',
            'captcha' => 'required|captcha'
        ];
    }


     public function attributes()
     {
        return [
            'name' => 'Ad Soyad',
            'phone' => 'Telefon Numarası',
            'email' => 'Eposta Adresi',
            'message' => 'Mesaj',
            'captcha' => 'Güvenlik Kodu'
        ];
     }

}
