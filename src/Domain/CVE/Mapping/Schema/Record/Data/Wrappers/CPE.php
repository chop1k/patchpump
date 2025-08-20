<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\CPE\Applicability as Wrapped;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class CPE
{
    public function __construct(
        private string $providedBy,
        private Schema\CPEApplicability $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Wrappers\CPE
    {
        return new Persistence\Record\Data\Wrappers\CPE(
            $this->providedBy,
            $this->applicability(),
        );
    }

    private function applicability(): Persistence\CPE\Applicability
    {
        return (new Wrapped($this->schema))->toPersistence();
    }
}
