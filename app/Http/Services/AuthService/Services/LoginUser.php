<?php

namespace App\Http\Services\AuthService\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

trait LoginUser
{
    /**
     * @throws \Exception
     */
    public function authenticate($data)
    {
        $user = User::query()->where('email', '=', $data['email'])->first();
        if ($user instanceof User) {
            if ($user->isVerified) {
                if (Hash::check($data['password'], $user['password'])) {
                    $token = $user->createToken('web')->plainTextToken;
                    return ['user' => $user, 'token' => $token];
                }
            }
            throw new \Exception('Whoops! user is not verified!');
        }
        throw new \Exception('Whoops! unable to find user!');
    }
}
