<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Containers;

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
         * @var Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Metric> $metrics
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'metric' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Metric::class,
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
