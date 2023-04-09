<?php

namespace App\Services\Provider;

use App\Models\Task;

class ProviderOne extends AbstractProvider
{
    protected string $name = 'ProviderOne';

    protected string $endpoint = 'http://www.mocky.io/v2/5d47f24c330000623fa3ebfa';

    public function getTasks(array $tasks): array
    {
        return array_map(function ($task) {
            return new Task([
                'provider_name' => $this->getName(),
                'name' => $task['id'] ?? 'Unnamed',
                'level' => $task['zorluk'] ?? 1,
                'estimated_duration' => $task['sure'] ?? 0,
                'complexity' => $this->calculateComplexity($task['zorluk'] ?? 0, $task['sure'] ?? 0),
            ]);
        }, $tasks);
    }
}
