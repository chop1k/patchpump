<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\RecordComparator;

use App\Domain\CVE\Synchronization\Contracts\RecordComparatorInterface;
use App\Persistence\Document\CVE\Record;
use Carbon\Carbon;

final class DateRecordComparator implements RecordComparatorInterface
{
    public function compare(Record $old, Record $new): bool
    {
        $oldUpdatedAt = $old->getMetadata()?->getUpdatedAt();

        if ($oldUpdatedAt === null) {
            return true;
        }

        $newUpdatedAt = $new->getMetadata()?->getUpdatedAt();

        if ($newUpdatedAt === null) {
            return false;
        }

        return Carbon::createFromImmutable($newUpdatedAt)->greaterThan($oldUpdatedAt);
    }
}