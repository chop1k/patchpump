<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\CPE\Applicability as Wrapped;
use App\Domain\CVE\Schema;

final readonly class CPE
{
    public function __construct(
        private string $providedBy,
        private Schema\CPEApplicability $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\CPE
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\CPE(
            $this->providedBy,
            $this->applicability(),
        );
    }

    private function applicability(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\CPE\Applicability
    {
        return new Wrapped($this->schema)->toPersistence();
    }
}
