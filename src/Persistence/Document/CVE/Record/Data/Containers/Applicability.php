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
class Applicability
{
    public function __construct(
        /**
         * @var Collection<non-negative-int, Wrappers\Affected> $affected
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'affected' => Wrappers\Affected::class,
            ]
        )]
        private Collection $affected,

        /**
         * @var Collection<non-negative-int, Wrappers\CPE>|null $cpe
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'affected' => Wrappers\CPE::class,
            ]
        )]
        private ?Collection $cpe,
    ) {
    }

    /**
     * @return Collection<non-negative-int, Wrappers\Affected>
     */
    public function affected(): Collection
    {
        return $this->affected;
    }

    /**
     * @return Collection<non-negative-int, Wrappers\CPE>|null
     */
    public function cpe(): ?Collection
    {
        return $this->cpe;
    }
}
