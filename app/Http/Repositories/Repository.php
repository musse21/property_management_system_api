<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository implements IRepository
{
    /**
     * @var Model
     */
    private $model;

    /**
     * Repository constructor.
     *
     * @param  Model  $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param  int|null  $id
     * @param  array  $filters
     * @return Model
     */
    public function getOne($id, array $filters = [])
    {
        if ($id != null) {
            $filters['filter']['id'] = $id;
        }

        return $this->getFiltered($filters)->first();
    }

    /**
     * @param  array  $filters
     * @return mixed
     */
    public function getAll(array $filters = [])
    {
        return $this->getFiltered($filters)->get();
    }

    /**
     * @param  array  $filters
     * @return mixed
     */
    public function getPaginated(array $filters = [])
    {
        $size = (isset($filters['page']) && isset($filters['page']['size'])) ? $filters['page']['size'] : null;
        $page = (isset($filters['page']) && isset($filters['page']['page'])) ? $filters['page']['page'] : null;

        return $this->getFiltered($filters)->paginate($size, ['*'], 'page', $page);
    }

    /**
     * @param $id
     * @param  array  $data
     * @return mixed|void
     */
    public function update($id, $data)
    {
        $filters['filter']['id'] = $id;

        return $this->getFiltered($filters)->update($data);
    }

    /**
     * @param $id
     * @param  array  $filters
     * @return mixed
     */
    public function delete($id, array $filters = [])
    {
        $filters['filter']['id'] = $id;

        return $this->getFiltered($filters)->delete();
    }

    public function getFiltered($filters)
    {
        $builder = $this->model->newQuery();
        if (isset($filters['filter']) && is_array($filters['filter'])) {
            foreach ($filters['filter'] as $key => $value) {
                $builder->where($key, str_starts_with($value, '!') ? '!=' : '=',
                    str_starts_with($value, '!') ? substr($value, 1) : $value);
            }
        }
        if (isset($filters['search']) && is_array($filters['search'])) {
            foreach ($filters['search'] as $key => $value) {
                $builder->where($key, 'like', "%{$value}%");
            }
        }
        if (isset($filters['sort']) && is_string($filters['sort'])) {
            $builder->orderBy(str_replace('-', '', $filters['sort']),
                str_contains($filters['sort'], '-') ? 'DESC' : 'ASC');
        }

        return $builder;
    }
}
