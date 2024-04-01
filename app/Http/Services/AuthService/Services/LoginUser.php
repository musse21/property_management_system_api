<?php

namespace App\Http\Services\AuthService\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

trait LoginUser
{
    /**
     * @throws \Exception
     */
    public function authenticate($data)
    {
        $email = $data['email'];
        $password = $data['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $token = JWTAuth::fromUser($user);
            if ($user->email_verified_at !== null) {
                return [$user, $token];
            } else {
                Auth::logout();
                return null;
            }
        } else {
            return false;
        }
    }
}
