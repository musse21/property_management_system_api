<?php

namespace App\Http\Services\AuthService\Services;
use App\Models\User;

trait RegisterUser
{
    public function registerUser($data): User
    {
        $user = $this->usersRepository->create($data);
            return $user;
    }
}
