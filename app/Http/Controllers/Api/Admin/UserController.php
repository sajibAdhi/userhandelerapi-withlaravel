<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersListRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Admin endpoint
 */
class UserController extends Controller
{
    /**
     * GET Users
     *
     * Get a list of Users.
     *
     * @authenticated
     *
     * @response {"data": [{"id": 1,"name": "Dolores Reynolds","division": "C","email": "sawayn.meda@example.net"},]}
     */
    public function index(UsersListRequest $request): AnonymousResourceCollection
    {
        $users = UserService::filterUsers($request);

        return UserResource::collection($users);
    }
}
