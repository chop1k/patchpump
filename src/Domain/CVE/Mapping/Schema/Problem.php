<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Problem
{
    public function __construct(
        private Schema\ProblemType $schema,
    ) {
    }

    public function toPersistence(): Persistence\Problem
    {
    }
}
