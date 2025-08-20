<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\CPE;

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
         * @var Collection<non-negative-int, Node> $nodes
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'node' => Node::class,
            ]
        )]
        private Collection $nodes,

        #[ODM\Field]
        private ?Operator $operator,

        #[ODM\Field]
        private ?bool $negate,
    ) {
    }

    /**
     * @return Collection<non-negative-int, Node>
     */
    public function nodes(): Collection
    {
        return $this->nodes;
    }

    public function operator(): ?Operator
    {
        return $this->operator;
    }

    public function negate(): ?bool
    {
        return $this->negate;
    }
}
