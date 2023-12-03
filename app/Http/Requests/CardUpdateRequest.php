<?php

namespace App\Http\Requests;

class CardUpdateRequest extends Request
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
            'tc' => 'required|digits:11',
            'card_number' => 'required|unique:sportives,card_number',
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
            'tc.required' => 'TC Kimlik No zorunludur.',
            'tc.digits' => 'TC Kimlik No 11 karakter olmalıdır.',
            'card_number.required' => 'Kart no zorunludur.',
            'card_number.unique' => 'Bu kart no ile daha önce personel tanımlama yapılmıştır.',
        ];
    }
}
