<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        return User::filter($request->all())
            ->paginate($request->get('limit', 15));
    }

    /**
     * @param StoreRequest $request
     * @return User|\Illuminate\Database\Eloquent\Model
     */
    public function store(StoreRequest $request)
    {
        $user = User::create($request->validated());
        $user->attachRole(Role::whereName(Role::WEB)->first());

        return $user;
    }

    /**
     * @param User $user
     * @return User
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return User
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return $user;
    }

    /**
     * @param User $user
     * @return array
     */
    public function destroy(User $user)
    {
        return ['result' => $user->delete()];
    }
}
