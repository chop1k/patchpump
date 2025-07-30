<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Comparator;

use App\Domain\Vulnerabilities\Synchronization\Contracts\ComparatorInterface;
use App\Persistence\Document\CVE\Record;
use Carbon\Carbon;

/**
 * @implements ComparatorInterface<Record>
 */
final class DateComparator implements ComparatorInterface
{
    public function newer(mixed $old, mixed $new): bool
    {
        $oldUpdatedAt = $old->getMetadata()?->getUpdatedAt();

        if (null === $oldUpdatedAt) {
            return true;
        }

        $newUpdatedAt = $new->getMetadata()?->getUpdatedAt();

        if (null === $newUpdatedAt) {
            return false;
        }

        return Carbon::createFromImmutable($newUpdatedAt)->greaterThan($oldUpdatedAt);
    }
}
