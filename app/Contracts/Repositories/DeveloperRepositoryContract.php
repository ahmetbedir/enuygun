<?php

namespace App\Contracts\Repositories;

use App\Models\Developer;
use Illuminate\Database\Eloquent\Collection;

interface DeveloperRepositoryContract extends BaseRepositoryContract
{
    public function resetAllEstimatedDurations(): void;

    public function getDevelopersWithTasks(): Collection;
}
