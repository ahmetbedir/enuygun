<?php

namespace App\Services\Provider;

use App\Models\Task;

class ProviderTwo extends AbstractProvider
{
    protected string $name = 'ProviderTwo';

    protected string $endpoint = 'http://www.mocky.io/v2/5d47f235330000623fa3ebf7';

    public function getTasks(array $tasks): array
    {
        return array_map(function ($task) {
            $taskName = key($task);

            return new Task([
                'provider_name' => $this->getName(),
                'name' => $taskName ?? 'Unnamed',
                'level' => $task[$taskName]['level'] ?? 1,
                'estimated_duration' => $task[$taskName]['estimated_duration'] ?? 0,
                'complexity' => $this->calculateComplexity($task[$taskName]['level'] ?? 0, $task[$taskName]['estimated_duration'] ?? 0),
            ]);
        }, $tasks);
    }
}
