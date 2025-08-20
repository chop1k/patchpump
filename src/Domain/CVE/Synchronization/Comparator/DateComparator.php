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
    /**
     * @param Record $old
     * @param Record $new
     */
    public function newer(mixed $old, mixed $new): bool
    {
        $oldUpdatedAt = $old->metadata()->updatedAt();

        if (null === $oldUpdatedAt) {
            return true;
        }

        $newUpdatedAt = $new->metadata()->updatedAt();

        if (null === $newUpdatedAt) {
            return false;
        }

        return Carbon::createFromImmutable($newUpdatedAt)->greaterThan($oldUpdatedAt);
    }
}
