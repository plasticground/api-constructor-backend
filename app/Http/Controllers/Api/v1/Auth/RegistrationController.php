<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\Role;
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
        $user->attachRole(Role::whereName(Role::WEB)->first());

        \Auth::login($user);

        $request->session()->regenerate();

        return $user;
    }
}
