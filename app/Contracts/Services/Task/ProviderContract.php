<?php

namespace App\Contracts\Services\Task;

interface ProviderContract
{
    public function getName(): string;

    public function getEndpoint(): string;

    public function fetchTasks(): ?array;

    public function getTasks(array $tasks): array;
}
