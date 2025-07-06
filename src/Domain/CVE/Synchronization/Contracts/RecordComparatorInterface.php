<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Contracts;

use App\Persistence\Document\CVE\Record;

interface RecordComparatorInterface
{
    public function compare(Record $old, Record $new): bool;
}