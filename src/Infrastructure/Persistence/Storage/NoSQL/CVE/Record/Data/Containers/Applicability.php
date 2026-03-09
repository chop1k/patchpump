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
class Applicability
{
    public function __construct(
        /**
         * @var Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Affected> $affected
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'affected' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Affected::class,
            ]
        )]
        private Collection $affected,

        /**
         * @var Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\CPE>|null $cpe
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'affected' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\CPE::class,
            ]
        )]
        private ?Collection $cpe = null,
    ) {
    }

    /**
     * @return Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Affected>
     */
    public function affected(): Collection
    {
        return $this->affected;
    }

    /**
     * @return Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\CPE>|null
     */
    public function cpe(): ?Collection
    {
        return $this->cpe;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->cpe ??= null;
    }
}
