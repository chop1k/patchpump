<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Metadata\Assigner;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Rejected
{
    public function __construct(
        private Schema\RecordMetadata $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Metadata\Assigner\Rejected
    {
        return new Persistence\Record\Metadata\Assigner\Rejected(
            $this->id(),
            $this->schema->assignerShortName,
        );
    }

    private function id(): string
    {
        return $this->schema->assignerOrgId ?? throw new \InvalidArgumentException();
    }
}
