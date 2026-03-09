<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Metric\Value;

use App\Domain\CVE\Schema;

final readonly class CVSS31
{
    public function __construct(
        private Schema\CVSS31 $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Metric\Value\CVSS31
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Metric\Value\CVSS31();
    }
}
