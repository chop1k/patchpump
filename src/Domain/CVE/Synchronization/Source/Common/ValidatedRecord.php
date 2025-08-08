<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source\Common;

use App\Domain\CVE\Mapping\RecordMapping;
use App\Domain\CVE\Schema\Record;

/**
 * @internal
 */
final readonly class ValidatedRecord
{
    public function __construct(
        private Record $record,
    ) {
    }

    public function toPersistence(): \App\Persistence\Document\CVE\Record
    {
        $mapping = new RecordMapping();

        return $mapping->fromSchema($this->record)
            ->toPersistence();
    }
}
