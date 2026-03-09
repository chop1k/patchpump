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
#[ODM\HasLifecycleCallbacks]
class History
{
    public function __construct(
        /**
         * @var Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Timeline>|null $timelines
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'timeline' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Timeline::class,
            ]
        )]
        private ?Collection $timelines = null,

        /**
         * @var Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Credit>|null $credits
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'credit' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Credit::class,
            ]
        )]
        private ?Collection $credits = null,

        /**
         * @var Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Source>|null $sources
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'source' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Source::class,
            ]
        )]
        private ?Collection $sources = null,
    ) {
    }

    /**
     * @return Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Timeline>|null
     */
    public function timelines(): ?Collection
    {
        return $this->timelines;
    }

    /**
     * @return Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Credit>|null
     */
    public function credits(): ?Collection
    {
        return $this->credits;
    }

    /**
     * @return Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Source>|null
     */
    public function sources(): ?Collection
    {
        return $this->sources;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->timelines ??= null;
        $this->credits ??= null;
        $this->sources ??= null;
    }
}
