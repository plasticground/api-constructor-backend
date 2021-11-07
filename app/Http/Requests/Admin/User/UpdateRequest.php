<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\JsonRequest;

class UpdateRequest extends JsonRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

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
                'min:2',
                'max:191',
            ],
            'email' => [
                'required',
                'email:filter',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'min:8',
                'max:255',
            ],
        ];
    }
}
