<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Metric\Value;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class CVSS20
{
    public function __construct(
        private Schema\CVSS20 $schema,
    ) {
    }

    public function toPersistence(): Persistence\Metric\Value\CVSS20
    {
        return new Persistence\Metric\Value\CVSS20();
    }
}
