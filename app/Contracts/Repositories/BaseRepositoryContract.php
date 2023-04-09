<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryContract
{
    public function all(): Collection;

    public function create(array $data): Model;

    public function update($id, array $data): bool;

    public function delete($id): bool;

    public function find($id): Model;

    public function findOrFail($id): Model;

    public function findBy($field, $value): Model;

    public function count(): int;
}
