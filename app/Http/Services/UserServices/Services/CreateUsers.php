<?php

namespace App\Http\Services\UserServices\Services;

use App\Http\Repositories\Models\UserRepository\UserRepository;
use App\Models\User;

trait CreateUsers
{
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        /** @var  $userRepository */

        $this->userRepository = $userRepository;
    }


    public function createUser(array $data): User
    {
        $user = $this->userRepository->create($data);
        $user->save();
        return $user;
    }
}
