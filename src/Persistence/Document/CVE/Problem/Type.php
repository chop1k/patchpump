<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Problem;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Type
{
    public function __construct(
        /**
         * @var Collection<non-negative-int, Description>|null $descriptions
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'description' => Description::class,
            ]
        )]
        private Collection $descriptions,
    ) {
    }

    /**
     * @return Collection<non-negative-int, Description>
     */
    public function descriptions(): Collection
    {
        return $this->descriptions;
    }
}
