<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source\Common;

use App\Domain\CVE\Mapping\RecordMapping;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

/**
 * @internal
 */
final readonly class ValidatedRecord
{
    public function __construct(
        private Schema\Record $record,
    ) {
    }

    public function toPersistence(): Persistence\Record
    {
        $mapping = new RecordMapping();

        return $mapping->fromSchema($this->record)
            ->toPersistence();
    }
}
