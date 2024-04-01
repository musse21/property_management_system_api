<?php

namespace App\Http\Services\AuthService;

use App\Http\Repositories\Models\UsersRepository;
use App\Http\Services\AuthService\Services\Authenticate;
use App\Http\Services\AuthService\Services\LoginUser;
use App\Http\Services\AuthService\Services\RegisterUser;
use App\Http\Services\AuthService\Services\ResetPassword;
use App\Http\Services\AuthService\Services\UserOneTimePassword;
use App\Http\Services\Service;
use App\Models\User;

class AuthsService extends Service
{
    use LoginUser, RegisterUser, ResetPassword, UserOneTimePassword, Authenticate;

    private UsersRepository $usersRepository;

    public function __construct()
    {
        $this->usersRepository = new UsersRepository(new User);
    }
}
