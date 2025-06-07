<?php

declare(strict_types=1);

namespace App\API\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;

final class AgentProcessor implements ProcessorInterface
{
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {
    }
}