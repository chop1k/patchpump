<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Mapping\Schema\Record;
use App\Domain\CVE\Schema;

/**
 * @todo empty arrays check
 * @todo fix tests
 */
final class RecordMapping
{
    public function fromSchema(Schema\Record $schema): Record
    {
        return new Record($schema);
    }
}
