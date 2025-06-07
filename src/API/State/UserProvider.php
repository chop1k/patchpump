<?php

namespace App\API\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;

class UserProvider implements ProviderInterface
{
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
    }
}
