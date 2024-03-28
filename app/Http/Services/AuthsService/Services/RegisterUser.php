<?php

namespace App\Http\Services\AuthsService\Services;

use App\Models\User;
use mysql_xdevapi\Exception;

trait RegisterUser
{
    public function registerUser($data)
    {
        try {
            $user = $this->userRepository->create($data);
            if ($user instanceof User) {
                return $user;
            }
            throw new Exception('Whoops! Unable to create account');
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
