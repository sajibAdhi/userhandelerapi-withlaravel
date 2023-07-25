<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class UserService
{
    public static function filterUsers(Request $request): LengthAwarePaginator
    {
        return User::query()
            ->when($request->email, function ($query, $email) {
                return $query->where('email', 'like', '%' . $email . '%');
            })
            ->when($request->division, function ($query, $division) {
                return $query->where('division', $division);
            })->paginate();
    }
}
