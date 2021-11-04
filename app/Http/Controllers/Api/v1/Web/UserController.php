<?php

namespace App\Http\Controllers\Api\v1\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\User\UpdateRequest;

class UserController extends Controller
{
    /**
     * @return \App\Models\User|null
     */
    public function index(): ?\App\Models\User
    {
        return \Auth::user();
    }

    /**
     * @param UpdateRequest $request
     * @return bool
     */
    public function update(UpdateRequest $request): bool
    {
        return \Auth::user()->update($request->validated());
    }
}
