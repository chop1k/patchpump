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
class Node
{
    public function __construct(
        #[ODM\Field]
        private Operator $operator,

        /**
         * @var Collection<non-negative-int, _Match> $matches
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'match' => _Match::class,
            ]
        )]
        private Collection $matches,

        #[ODM\Field]
        private ?bool $negate,
    ) {
    }

    public function operator(): Operator
    {
        return $this->operator;
    }

    /**
     * @return Collection<non-negative-int, _Match>
     */
    public function matches(): Collection
    {
        return $this->matches;
    }

    public function negate(): ?bool
    {
        return $this->negate;
    }
}
