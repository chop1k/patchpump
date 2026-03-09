<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Comparator;

use App\Domain\Vulnerabilities\Synchronization\Contracts\ComparatorInterface;
use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\AbstractRecord;
use Carbon\Carbon;
use Override;

/**
 * @implements ComparatorInterface<AbstractRecord>
 */
final class DateComparator implements ComparatorInterface
{
    /**
     * @param AbstractRecord $old
     * @param AbstractRecord $new
     */
    #[Override]
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
