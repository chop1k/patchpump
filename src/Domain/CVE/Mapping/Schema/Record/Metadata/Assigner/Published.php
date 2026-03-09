<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Metadata\Assigner;

use App\Domain\CVE\Schema;
use InvalidArgumentException;

final readonly class Published
{
    public function __construct(
        private Schema\RecordMetadata $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Metadata\Assigner\Published
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Metadata\Assigner\Published(
            $this->id(),
            $this->schema->assignerShortName,
            $this->schema->requesterUserId,
        );
    }

    private function id(): string
    {
        return $this->schema->assignerOrgId ?? throw new InvalidArgumentException();
    }
}
