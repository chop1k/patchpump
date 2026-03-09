<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source\Common;

use App\Domain\CVE\Mapping\RecordMapping;
use App\Domain\CVE\Schema;

/**
 * @internal
 *
 * @psalm-internal App\Domain\CVE\Synchronization\Source
 */
final readonly class ValidatedRecord
{
    public function __construct(
        private Schema\Record $record,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\AbstractRecord
    {
        $mapping = new RecordMapping();

        return $mapping->fromSchema($this->record)
            ->toPersistence();
    }
}
