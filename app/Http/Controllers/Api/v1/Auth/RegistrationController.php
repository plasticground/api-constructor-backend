<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;

class RegistrationController extends Controller
{
    /**
     * @param RegistrationRequest $request
     * @return User|\Illuminate\Database\Eloquent\Model
     */
    public function __invoke(RegistrationRequest $request)
    {
        $user = User::create($request->validated());

        \Auth::login($user);

        $request->session()->regenerate();

        return $user;
    }
}
