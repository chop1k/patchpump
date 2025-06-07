<?php

declare(strict_types=1);

namespace App\API\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;

final class ActiveProvider implements ProviderInterface
{
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
    }
}
