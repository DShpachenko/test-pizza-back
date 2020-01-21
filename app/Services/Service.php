<?php

namespace App\Services;

/**
 * Class Service
 * @package App\Services
 */
abstract class Service
{
    /**
     * Repository object.
     */
    public $repository;

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->repository->all();
    }

    /**
     * @return mixed
     */
    public function paginated()
    {
        return $this->repository->paginated(config('paginate'));
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function create(array $input)
    {
        return $this->repository->create($input);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param $id
     * @param array $input
     * @return mixed
     */
    public function update($id, array $input)
    {
        return $this->repository->update($id, $input);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
