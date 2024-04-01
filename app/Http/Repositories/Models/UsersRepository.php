<?php

namespace App\Http\Repositories\Models;

use App\Http\Repositories\Repository;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class UsersRepository extends Repository
{
    public function create($data)
    {
        try {
            $user = new User();

                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->save();

                return $user;

        } catch (\Exception $e) {
            return Response::json(array(
                'message' => $e->getMessage()
            ), 500);
        }

    }

    public function update($id, $data)
    {
        $user = User::findOrFail($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->$this->password = bcrypt($data['password']);
        $user->save();
        return $user;
    }
}
