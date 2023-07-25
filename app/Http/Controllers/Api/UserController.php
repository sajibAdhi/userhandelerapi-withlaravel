<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

/**
 * @group User endpoint
 */
class UserController extends Controller
{
    /**
     * POST Signup
     *
     * Create a User.
     *
     *
     * @response {"data": {"id": 1, "name": "Random Name", "email": "example@example.com", "division": "A"}}
     * @response 422 {"message": "The given data was invalid.", "errors": {"email": ["The email has already been taken."]}}
     */
    public function store(StoreUserRequest $request): UserResource
    {
        $user = User::create($request->validated());

        return new UserResource($user);
    }
}
