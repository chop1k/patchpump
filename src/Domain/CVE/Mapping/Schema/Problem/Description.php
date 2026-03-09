<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Problem;

use App\Domain\CVE\Mapping\Schema\Common\Reference;
use App\Domain\CVE\Schema;
use Doctrine\Common\Collections\ArrayCollection;
use InvalidArgumentException;

/**
 * @internal
 */
final readonly class Description
{
    public function __construct(
        private Schema\ProblemDescription $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Problem\Description
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Problem\Description(
            $this->language(),
            $this->content(),
            $this->schema->cweId,
            $this->schema->type,
            $this->references(),
        );
    }

    private function language(): string
    {
        return $this->schema->lang ?? throw new InvalidArgumentException();
    }

    private function content(): string
    {
        return $this->schema->description ?? throw new InvalidArgumentException();
    }

    /**
     * @return ArrayCollection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Reference>|null
     */
    private function references(): ?ArrayCollection
    {
        if (null === $this->schema->references) {
            return null;
        }

        $elements = array_map(
            static fn (Schema\Reference $node) => new Reference($node)->toPersistence(),
            array_values($this->schema->references),
        );

        return new ArrayCollection($elements);
    }
}
