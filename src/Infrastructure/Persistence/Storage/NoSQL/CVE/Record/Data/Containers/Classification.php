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
class Classification
{
    public function __construct(
        /**
         * @var Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Tags>|null $tags
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'tags' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Tags::class,
            ]
        )]
        private ?Collection $tags = null,

        /**
         * @var Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Taxonomy>|null $taxonomies
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'taxonomy' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Taxonomy::class,
            ]
        )]
        private ?Collection $taxonomies = null,
    ) {
    }

    /**
     * @return Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Tags>|null
     */
    public function tags(): ?Collection
    {
        return $this->tags;
    }

    /**
     * @return Collection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Taxonomy>|null
     */
    public function taxonomies(): ?Collection
    {
        return $this->taxonomies;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->tags ??= null;
        $this->taxonomies ??= null;
    }
}
