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
class Classification
{
    public function __construct(
        /**
         * @var Collection<non-negative-int, Wrappers\Tags>|null $tags
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'tags' => Wrappers\Tags::class,
            ]
        )]
        private ?Collection $tags,

        /**
         * @var Collection<non-negative-int, Wrappers\Taxonomy>|null $taxonomies
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'taxonomy' => Wrappers\Taxonomy::class,
            ]
        )]
        private ?Collection $taxonomies,
    ) {
    }

    /**
     * @return Collection<non-negative-int, Wrappers\Tags>|null
     */
    public function tags(): ?Collection
    {
        return $this->tags;
    }

    /**
     * @return Collection<non-negative-int, Wrappers\Taxonomy>|null
     */
    public function taxonomies(): ?Collection
    {
        return $this->taxonomies;
    }
}
