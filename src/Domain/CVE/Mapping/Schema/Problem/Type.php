<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Problem;

use App\Domain\CVE\Schema;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @internal
 */
final readonly class Type
{
    public function __construct(
        private Schema\ProblemType $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Problem\Type
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Problem\Type(
            $this->descriptions(),
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Problem\Description>|null
     */
    private function descriptions(): ?ArrayCollection
    {
        $elements = array_map(
            static fn (Schema\ProblemDescription $node) => new Description($node)->toPersistence(),
            array_values($this->schema->descriptions),
        );

        return new ArrayCollection($elements);
    }
}
