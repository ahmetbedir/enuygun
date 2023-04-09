<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find($id): Model
    {
        return $this->model->find($id);
    }

    public function findOrFail($id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function findBy($field, $value): Model
    {
        return $this->model->where($field, $value)->first();
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update($id, array $data): bool
    {
        $record = $this->model->find($id);

        return $record->update($data);
    }

    public function delete($id): bool
    {
        return $this->model->destroy($id);
    }

    public function count(): int
    {
        return $this->model->count();
    }
}
