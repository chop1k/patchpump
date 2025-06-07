<?php

declare(strict_types=1);

namespace App\Persistence\Repository;

use App\Persistence\Entity\User;

final readonly class UserRepository
{
    public function __construct(
    ) {
    }

    public function findById(int $id): User
    {
        throw new \BadMethodCallException('Not implemented');
    }
}
