<?php

namespace App\Http\Controllers\Api\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

/**
 * @group Admin Auth endpoint
 */
class LoginController extends Controller
{
    /**
     * POST Login
     *
     * Admin Login
     *
     * @response {"access_token": "token"}
     * @response 422 {"email": ["The provided credentials are incorrect."]}
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $user = Admin::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'email' => ['The provided credentials are incorrect.'],
            ], 422);
        }

        $device = substr($request->userAgent(), 0, 255);

        return response()->json([
            'access_token' => $user->createToken($device)->plainTextToken,
        ]);
    }
}
