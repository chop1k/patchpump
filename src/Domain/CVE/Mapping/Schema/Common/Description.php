<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Common;

use App\Domain\CVE\Schema;
use Doctrine\Common\Collections\ArrayCollection;
use InvalidArgumentException;

/**
 * @internal
 */
final readonly class Description
{
    public function __construct(
        private Schema\Description $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Description\Description
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Description\Description(
            $this->language(),
            $this->value(),
            $this->media(),
        );
    }

    private function language(): string
    {
        return $this->schema->lang ?? throw new InvalidArgumentException();
    }

    private function value(): string
    {
        return $this->schema->value ?? throw new InvalidArgumentException();
    }

    /**
     * @return ArrayCollection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Description\Media>|null
     */
    private function media(): ?ArrayCollection
    {
        if (null === $this->schema->supportingMedia) {
            return null;
        }

        $elements = array_map(
            static fn (Schema\DescriptionMedia $node) => new Description\Media($node)->toPersistence(),
            array_values($this->schema->supportingMedia),
        );

        return new ArrayCollection($elements);
    }
}
