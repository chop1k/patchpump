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
    private function __construct(
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
        private ?int $operator,

        #[ODM\Field]
        private ?bool $negate,
    ) {
    }

    /**
     * @param Collection<non-negative-int, Node> $matches
     */
    public static function withAnd(Collection $matches, ?bool $negate): self
    {
        return new self($matches, 1, $negate);
    }

    /**
     * @param Collection<non-negative-int, Node> $matches
     */
    public static function withOr(Collection $matches, ?bool $negate): self
    {
        return new self($matches, 2, $negate);
    }

    /**
     * @param Collection<non-negative-int, Node> $matches
     */
    public static function withNull(Collection $matches, ?bool $negate): self
    {
        return new self($matches, null, $negate);
    }

    /**
     * @return Collection<non-negative-int, Node>
     */
    public function nodes(): Collection
    {
        return $this->nodes;
    }

    public function and(): bool
    {
        return 1 === $this->operator;
    }

    public function or(): bool
    {
        return 2 === $this->operator;
    }

    public function negate(): ?bool
    {
        return $this->negate;
    }
}
