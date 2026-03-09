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
class Summary
{
    public function __construct(
        /**
         * @var Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Title> $titles
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'title' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Title::class,
            ]
        )]
        private Collection $titles,

        /**
         * @var Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Description> $descriptions
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'description' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Description::class,
            ]
        )]
        private Collection $descriptions,

        /**
         * @var Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Reference>|null $references
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'reference' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Reference::class,
            ]
        )]
        private ?Collection $references = null,

        /**
         * @var Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Problem>|null $problems
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'problem' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Problem::class,
            ]
        )]
        private ?Collection $problems = null,
    ) {
    }

    /**
     * @return Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Title>
     */
    public function titles(): Collection
    {
        return $this->titles;
    }

    /**
     * @return Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Description>
     */
    public function descriptions(): Collection
    {
        return $this->descriptions;
    }

    /**
     * @return Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Reference>|null
     */
    public function references(): ?Collection
    {
        return $this->references;
    }

    /**
     * @return Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Problem>|null
     */
    public function problems(): ?Collection
    {
        return $this->problems;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->references ??= null;
        $this->problems ??= null;
    }
}
