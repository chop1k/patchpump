<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data;

use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Description\Description;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
#[ODM\HasLifecycleCallbacks]
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
         * @var Collection<non-negative-int, Description> $reasons
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'reason' => Description::class,
            ]
        )]
        private Collection $reasons,

        /**
         * @var string[]|null $replacedBy
         */
        #[ODM\Field(type: 'collection')]
        private ?array $replacedBy = null,
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

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->replacedBy ??= null;
    }
}
