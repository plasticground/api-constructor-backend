<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255',
                'unique:users,name'
            ],
            'email' => [
                'required',
                'string',
                'max:255',
                'email:filter',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
                'confirmed'
            ]
        ];
    }
}
