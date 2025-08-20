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
class Summary
{
    public function __construct(
        /**
         * @var Collection<non-negative-int, Wrappers\Title> $titles
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'title' => Wrappers\Title::class,
            ]
        )]
        private Collection $titles,

        /**
         * @var Collection<non-negative-int, Wrappers\Description> $descriptions
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'description' => Wrappers\Description::class,
            ]
        )]
        private Collection $descriptions,

        /**
         * @var Collection<non-negative-int, Wrappers\Reference>|null $references
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'reference' => Wrappers\Reference::class,
            ]
        )]
        private ?Collection $references,

        /**
         * @var Collection<non-negative-int, Wrappers\Problem>|null $problems
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'problem' => Wrappers\Problem::class,
            ]
        )]
        private ?Collection $problems,
    ) {
    }

    /**
     * @return Collection<non-negative-int, Wrappers\Title>
     */
    public function titles(): Collection
    {
        return $this->titles;
    }

    /**
     * @return Collection<non-negative-int, Wrappers\Description>
     */
    public function descriptions(): Collection
    {
        return $this->descriptions;
    }

    /**
     * @return Collection<non-negative-int, Wrappers\Reference>|null
     */
    public function references(): ?Collection
    {
        return $this->references;
    }

    /**
     * @return Collection<non-negative-int, Wrappers\Problem>|null
     */
    public function problems(): ?Collection
    {
        return $this->problems;
    }
}
