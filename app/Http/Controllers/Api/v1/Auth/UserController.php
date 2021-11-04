<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $role = $user->roles()->first()->name;

        return compact('user', 'role');
    }
}
