<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $request['phone'] = str_replace([" ", "(", ")", "-"], "", trim($request->phone));
        return [
            'name' => 'required|max:191|min:3',
            'phone' => 'required|size:3',
            'email' => 'required|max:191|min:3|unique:users',
            'password' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Ad Soyad',
            'phone' => 'Telefon',
            'email' => 'Email',
            'password' => 'Şifre',
        ];
    }
}
