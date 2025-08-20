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
class History
{
    public function __construct(
        /**
         * @var Collection<non-negative-int, Wrappers\Timeline>|null $timelines
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'timeline' => Wrappers\Timeline::class,
            ]
        )]
        private ?Collection $timelines,

        /**
         * @var Collection<non-negative-int, Wrappers\Credit>|null $credits
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'credit' => Wrappers\Credit::class,
            ]
        )]
        private ?Collection $credits,

        /**
         * @var Collection<non-negative-int, Wrappers\Source>|null $sources
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'source' => Wrappers\Source::class,
            ]
        )]
        private ?Collection $sources,
    ) {
    }

    /**
     * @return Collection<non-negative-int, Wrappers\Timeline>|null
     */
    public function timelines(): ?Collection
    {
        return $this->timelines;
    }

    /**
     * @return Collection<non-negative-int, Wrappers\Credit>|null
     */
    public function credits(): ?Collection
    {
        return $this->credits;
    }

    /**
     * @return Collection<non-negative-int, Wrappers\Source>|null
     */
    public function sources(): ?Collection
    {
        return $this->sources;
    }
}
