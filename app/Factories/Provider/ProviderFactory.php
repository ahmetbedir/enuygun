<?php

namespace App\Factories\Provider;

use App\Contracts\Services\Task\ProviderContract;

class ProviderFactory
{
    private array $providers = [
        'ProviderOne' => \App\Services\Provider\ProviderOne::class,
        'ProviderTwo' => \App\Services\Provider\ProviderTwo::class,
    ];

    public function create(string $providerName): ProviderContract
    {
        if (!isset($this->providers[$providerName])) {
            throw new \Exception('Provider not found: ' . $providerName);
        }

        if (!class_exists($this->providers[$providerName])) {
            throw new \Exception('Provider class not found: ' . $this->providers[$providerName]);
        }

        return new $this->providers[$providerName];
    }

    public function getProviders(): array
    {
        return array_map(fn ($provider) => $this->create($provider), array_keys($this->providers));
    }
}
