<?php

declare(strict_types = 1);

namespace App\Persistence\Repository;

use App\Persistence\Entity\Program;
use Doctrine\ORM\Tools\Pagination\Paginator;

final readonly class ProgramRepository
{
    public function __construct(
    ) {
    }

    public function findById(int $id): Program
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function findByNamePaginated(string $name, int $page, int $size): Paginator
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function findByVulnerabilityPaginated(int $vulnerability, int $page, int $size): Paginator
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function findByActivePaginated(int $active, int $page, int $size): Paginator
    {
        throw new \BadMethodCallException('Not implemented');
    }
}
