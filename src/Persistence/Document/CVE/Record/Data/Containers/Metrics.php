<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Record\Data\Containers;

use App\Persistence\Document\CVE\Record\Data\Wrappers;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Metrics
{
    public function __construct(
        /**
         * @var Collection<non-negative-int, Wrappers\Metric> $metrics
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'metric' => Wrappers\Metric::class,
            ]
        )]
        private Collection $metrics,
    ) {
    }

    public function metrics(): Collection
    {
        return $this->metrics;
    }
}
