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
    private function __construct(
        #[ODM\Field]
        private int $operator,

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

    /**
     * @param Collection<non-negative-int, _Match> $matches
     */
    public static function withAnd(Collection $matches, ?bool $negate): self
    {
        return new self(1, $matches, $negate);
    }

    /**
     * @param Collection<non-negative-int, _Match> $matches
     */
    public static function withOr(Collection $matches, ?bool $negate): self
    {
        return new self(2, $matches, $negate);
    }

    public function and(): bool
    {
        return 1 === $this->operator;
    }

    public function or(): bool
    {
        return 2 === $this->operator;
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
