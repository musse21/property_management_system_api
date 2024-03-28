<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

interface IRepository
{
    /**
     * @param $id
     * @param  array  $filters
     * @return Model
     */
    public function getOne($id, array $filters = []);

    /**
     * @param  array  $filters
     * @return mixed
     */
    public function getAll(array $filters = []);

    /**
     * @param  array  $filters
     * @return mixed
     */
    public function getPaginated(array $filters = []);

    /**
     * Repository constructor.
     *
     * @param  array  $data
     * @return  Model $model
     */
    public function create($data);

    /**
     * @param $id
     * @param  array  $data
     * @param  array  $filters
     * @return mixed
     */
    public function update($id, $data);

    /**
     * @param $id
     * @param  array  $filters
     * @return mixed
     */
    public function delete($id, array $filters = []);
}
