<?php

namespace App\Repositories;

use App\Contracts\Repositories\DeveloperRepositoryContract;
use App\Models\Developer;
use Illuminate\Database\Eloquent\Collection;

class DeveloperRepository extends BaseRepository implements DeveloperRepositoryContract
{
    public function __construct(Developer $model)
    {
        parent::__construct($model);
    }

    public function resetAllEstimatedDurations(): void
    {
        $this->model->query()->update(['estimated_duration' => 0]);
    }

    public function getDevelopersWithTasks(): Collection
    {
        return $this->model->with('tasks')->withCount('tasks')->get();
    }
}
