<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use App\Persistence\Enum\CVE\AffectionStatus;
use Doctrine\Common\Collections\Collection;

final readonly class AffectedVersions
{
    public function __construct(
        private mixed $value,
    ) {
    }

    public function status(): AffectionStatus
    {

    }

    /**
     * @return Collection<AffectedVersion>
     */
    public function versions(): Collection
    {

    }
}