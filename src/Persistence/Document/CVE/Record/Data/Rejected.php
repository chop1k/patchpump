<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Record\Data;

use App\Persistence\Document\CVE\Common\Description\Description;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Rejected
{
    public function __construct(
        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'rejected' => Provider\Rejected::class,
            ]
        )]
        private Provider\Rejected $provider,

        /**
         * @var Collection<non-negative-int, Description>
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'reason' => Description::class,
            ]
        )]
        private Collection $reasons,

        /**
         * @var string[]|null
         */
        #[ODM\Field(type: 'collection')]
        private ?array $replacedBy,
    ) {
    }

    public function provider(): Provider\Rejected
    {
        return $this->provider;
    }

    /**
     * @return Collection<non-negative-int, Description>
     */
    public function reasons(): Collection
    {
        return $this->reasons;
    }

    /**
     * @return string[]|null
     */
    public function replacedBy(): ?array
    {
        return $this->replacedBy;
    }
}
