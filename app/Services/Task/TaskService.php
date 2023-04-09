<?php

namespace App\Services\Task;

use App\Contracts\Repositories\DeveloperRepositoryContract;
use App\Contracts\Repositories\TaskRepositoryContract;
use App\Models\Developer;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

class TaskService
{
    private TaskRepositoryContract $taskRepository;

    private DeveloperRepositoryContract $developerRepository;

    public function __construct(
        TaskRepositoryContract $taskRepository,
        DeveloperRepositoryContract $developerRepository
    ) {
        $this->taskRepository = $taskRepository;
        $this->developerRepository = $developerRepository;
    }

    public function registerTasks(array $tasks): void
    {
        foreach ($tasks as $task) {
            $this->taskRepository->create($task->toArray());
        }
    }

    public function assingTasksToDevelopers(): void
    {
        $tasks = $this->taskRepository->all();
        $developers = $this->developerRepository->all();


        foreach ($tasks as $task) {
            $plan = collect();

            foreach ($developers as $developer) {
                if ($task->level > $developer->level) {
                    continue;
                }

                $plan[$developer->name] = [
                    'developer' => $developer,
                    'task' => $task,
                    'estimated' => rescue(fn () => $developer->estimated_duration + ($task->complexity / $developer->level), 0),
                ];
            }

            $allocatedTask = $plan->sortBy('estimated')->first();

            if (empty($allocatedTask)) {
                continue;
            }

            $this->assignDeveloper($allocatedTask['task'], $allocatedTask['developer']);
        }
    }

    public function assignDeveloper(Task $task, Developer $developer)
    {
        $task->developer()->associate($developer);
        $task->developer->estimated_duration = rescue(fn () => round($developer->estimated_duration + ($task->complexity / $developer->level)), 0);
        $task->developer_work_week = $this->calculateEstimatedWeeks($task->developer->estimated_duration);
        $task->push();
    }

    public function getStatistics(Collection $tasks, Collection $developers): SupportCollection
    {
        return collect([
            'total_tasks' => $tasks->count(),
            'total_developers' => $developers->count(),
            'tasks_per_developer' => rescue(fn () => $tasks->count() / $developers->count(), 0),
            'total_developers_estimated_hours' => $developers->sum('estimated_duration') ?? 0,
            'total_developers_estimated_weeks' => $this->calculateEstimatedWeeks($developers->sum('estimated_duration'), $developers->count()),
            'total_tasks_estimated_hours' => $tasks->sum('estimated_duration'),
            'total_tasks_estimated_weeks' => $this->calculateEstimatedWeeks($tasks->sum('estimated_duration'), $developers->count()),
        ]);
    }

    public function calculateEstimatedWeeks(int $estimatedHours, $developerCount = null): int
    {
        $estimatedWeek = (int) rescue(fn () => ceil($estimatedHours / Developer::WEEKLY_WORKING_HOURS), 0);

        if ($developerCount) {
            $estimatedWeek = (int) rescue(fn () => ceil($estimatedWeek / $developerCount), 0);
        }

        return $estimatedWeek;
    }
}
