<?php

namespace App\Http\Repositories\Models\UserRepository;

use App\Http\Repositories\IRepository;
use App\Http\Repositories\Repository;
use App\Models\User;

class UserRepository extends Repository implements IRepository
{
    /**
     * @throws \Exception
     */
    public function create($data) {

        try {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            return $user;
        } catch (\Exception $e) {
            // Handle database errors
            throw new \Exception('Unable to create user: ' . $e->getMessage());
        }

    }

    public function update($id, $data)
    {
        $userUpdate = User::findOrFail($id);
        $userUpdate->name = $data->name;
        $userUpdate->email = $data->email;
        $userUpdate->password = $data->password;
        $userUpdate->save();
        return $userUpdate;
    }
}
