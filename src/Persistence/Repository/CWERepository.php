<?php

declare(strict_types=1);

namespace App\Persistence\Repository;

use App\Persistence\Entity\CWE;

final readonly class CWERepository
{
    public function __construct(
    ) {
    }

    public function findById(int $id): CWE
    {
        throw new \BadMethodCallException('Not implemented');
    }
}
