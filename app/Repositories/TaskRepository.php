<?php

namespace App\Repositories;

use App\Contracts\Repositories\TaskRepositoryContract;
use App\Models\Developer;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

class TaskRepository extends BaseRepository implements TaskRepositoryContract
{
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function deleteAll(): void
    {
        $this->model->truncate();
    }

    public function getTasksWithDeveloper(): Collection
    {
        return $this->model->with('developer')->get();
    }

    public function getWeeklyTaskPlan(): Collection
    {
        return $this->model->with('developer')
            ->orderBy('developer_work_week')
            ->get()
            ->groupBy('developer_work_week');
    }
}
