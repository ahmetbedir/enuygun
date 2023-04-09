<?php

namespace App\Services\Provider;

use Illuminate\Support\Facades\Http;
use App\Contracts\Services\Task\ProviderContract;

abstract class AbstractProvider implements ProviderContract
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @return array|null
     */
    public function fetchTasks(): ?array
    {
        return Http::acceptJson()
            ->get($this->getEndpoint())
            ->throw()
            ->json();
    }

    protected function calculateComplexity(int $level, int $estimatedDuration): int
    {
        return $level * $estimatedDuration;
    }

    abstract public function getTasks(array $tasks): array;
}
