<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Problem;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
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

    public function toPersistence(): Persistence\Problem\Type
    {
        return new Persistence\Problem\Type(
            $this->descriptions(),
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Problem\Description>|null
     */
    private function descriptions(): ?ArrayCollection
    {
        $elements = array_map(
            static fn (Schema\ProblemDescription $node) => (new Description($node))->toPersistence(),
            $this->schema->descriptions,
        );

        return new ArrayCollection($elements);
    }
}
