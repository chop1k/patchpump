<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\Problem\Type as Wrapped;
use App\Domain\CVE\Schema;

final readonly class Problem
{
    public function __construct(
        private string $providedBy,
        private Schema\ProblemType $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Problem
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Problem(
            $this->providedBy,
            $this->type(),
        );
    }

    private function type(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Problem\Type
    {
        return new Wrapped($this->schema)->toPersistence();
    }
}
