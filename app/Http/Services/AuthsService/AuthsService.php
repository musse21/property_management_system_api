<?php

namespace App\Http\Services\AuthsService;

use App\Http\Services\AuthsService\Services\LoginUser;
use App\Http\Services\AuthsService\Services\RegisterUser;
use App\Http\Services\AuthsService\Services\ResetPassword;
use App\Http\Services\AuthsService\Services\UserOneTimePassword;
use App\Http\Services\Service;

class AuthsService extends Service
{
    use LoginUser, RegisterUser, ResetPassword, UserOneTimePassword;
}
