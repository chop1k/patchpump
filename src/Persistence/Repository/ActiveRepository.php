<?php

declare(strict_types=1);

namespace App\Persistence\Repository;

use App\Persistence\Entity\Active;
use App\Persistence\Enum\ActiveSorting;
use Doctrine\ORM\Tools\Pagination\Paginator;

final readonly class ActiveRepository
{
    public function __construct(
    ) {
    }

    public function findById(int $id): Active
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function findAllPaginated(int $page, int $size, ActiveSorting $sorting): Paginator
    {
        throw new \BadMethodCallException('Not implemented');
    }
}
