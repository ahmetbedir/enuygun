<?php

namespace App\Console\Commands;

use App\Contracts\Repositories\DeveloperRepositoryContract;
use App\Models\Task;
use Illuminate\Console\Command;
use App\Factories\Provider\ProviderFactory;
use App\Repositories\TaskRepository;
use App\Services\Task\TaskService;

class FetchTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch tasks from providers';

    /**
     * Execute the console command.
     */
    public function handle(
        ProviderFactory $providerFactory,
        TaskRepository $taskRepository,
        TaskService $taskService,
        DeveloperRepositoryContract $developerRepository,
    ) {
        $taskRepository->deleteAll();
        $developerRepository->resetAllEstimatedDurations();

        $providers = $providerFactory->getProviders();

        foreach ($providers as $provider) {
            $tasks = $provider->getTasks($provider->fetchTasks());

            $taskService->registerTasks($tasks);
        }

        $taskService->assingTasksToDevelopers();

        $this->line('All tasks fetched');
    }
}
