<?php

namespace App\Http\Services\AuthService\Services;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

trait Authenticate
{
    public function authenticateUser($data)
    {
        $email = $data['email'];
        $password = $data['password'];

        $user = User::query()->where('email', '=', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            $user->email_verified_at = now();
            $user->save();
            $token = JWTAuth::fromUser($user);
            return $token;
        }

        return null;
    }
}
