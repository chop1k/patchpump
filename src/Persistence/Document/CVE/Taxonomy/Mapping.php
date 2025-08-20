<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Taxonomy;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Mapping
{
    public function __construct(
        #[ODM\Field]
        private string $name,

        /**
         * @var Collection<non-negative-int, Relation> $relations
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'relation' => Relation::class,
            ]
        )]
        private Collection $relations,

        #[ODM\Field]
        private ?string $version = null,
    ) {
    }

    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return Collection<non-negative-int, Relation>
     */
    public function relations(): Collection
    {
        return $this->relations;
    }

    public function version(): ?string
    {
        return $this->version;
    }
}
