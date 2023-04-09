<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\TaskRepositoryContract;
use App\Contracts\Repositories\DeveloperRepositoryContract;
use App\Services\Task\TaskService;

class MainController extends Controller
{
    public function index(
        TaskRepositoryContract $taskRepository,
        DeveloperRepositoryContract $developerRepository,
        TaskService $taskService,
    ) {
        $weeklyTaskPlan = $taskRepository->getWeeklyTaskPlan();
        $tasks = $taskRepository->getTasksWithDeveloper();
        $developers = $developerRepository->getDevelopersWithTasks();
        $statistics = $taskService->getStatistics($tasks, $developers);

        return view('main', compact('weeklyTaskPlan', 'tasks', 'developers', 'statistics'));
    }
}
