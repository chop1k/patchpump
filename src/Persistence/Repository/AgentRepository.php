<?php

declare(strict_types=1);

namespace App\Persistence\Repository;

use App\Entity\Agent;

final readonly class AgentRepository
{
    public function __construct(
    ) {
    }

    public function findById(int $id): Agent
    {
        throw new \BadMethodCallException('Not implemented');
    }
}
