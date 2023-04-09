<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

interface TaskRepositoryContract extends BaseRepositoryContract
{
    public function deleteAll(): void;

    public function getTasksWithDeveloper(): Collection;

    public function getWeeklyTaskPlan(): Collection;
}
