<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Metadata\Assigner;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Published
{
    public function __construct(
        private Schema\RecordMetadata $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Metadata\Assigner\Published
    {
        return new Persistence\Record\Metadata\Assigner\Published(
            $this->schema->assignerOrgId,
            $this->schema->assignerShortName,
            $this->schema->requesterUserId,
        );
    }
}
