<?php

namespace App\Http\Services\UserServices;

use App\Http\Services\Service;
use App\Http\Services\UserServices\Services\CreateUsers;
use App\Http\Services\UserServices\Services\DeleteUsers;
use App\Http\Services\UserServices\Services\GetUsers;
use App\Http\Services\UserServices\Services\UpdateUsers;

class UserService extends Service
{
    use CreateUsers, DeleteUsers, GetUsers, UpdateUsers;
}
