<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source\Common;

use App\Domain\CVE\Mapping\RecordMapper;
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
        return RecordMapper::mapSchemaToPersistence($this->record);
    }
}
