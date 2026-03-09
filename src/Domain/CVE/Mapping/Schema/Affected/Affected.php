<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Affected;

use App\Domain\CVE\Schema;
use Doctrine\Common\Collections\ArrayCollection;
use InvalidArgumentException;

/**
 * @internal
 */
final readonly class Affected
{
    public function __construct(
        private Schema\Affected $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\AbstractAffected
    {
        if (null !== $this->schema->vendor && null !== $this->schema->product) {
            return $this->product();
        }

        if (null !== $this->schema->packageName && null !== $this->schema->collectionURL) {
            return $this->package();
        }

        throw new InvalidArgumentException();
    }

    private function product(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Product
    {
        if (null === $this->schema->vendor || null === $this->schema->product) {
            throw new InvalidArgumentException();
        }

        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Product(
            new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Subject\Product(
                $this->schema->vendor,
                $this->schema->product,
                $this->schema->collectionURL,
                $this->schema->packageName,
            ),
            $this->enumeration(),
            $this->source(),
        );
    }

    private function package(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Package
    {
        if (null === $this->schema->packageName || null === $this->schema->collectionURL) {
            throw new InvalidArgumentException();
        }

        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Package(
            new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Subject\Package(
                $this->schema->collectionURL,
                $this->schema->packageName,
                $this->schema->vendor,
                $this->schema->product,
            ),
            $this->enumeration(),
            $this->source(),
        );
    }

    private function source(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Source
    {
        return new Source($this->schema)->toPersistence();
    }

    private function enumeration(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Enumeration
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Enumeration(
            $this->container(),
            $this->schema->cpes,
            $this->schema->platforms,
        );
    }

    /**
     * @return \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Version\Status|\App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Version\_List
     */
    private function container(): mixed
    {
        if (null !== $this->schema->defaultStatus) {
            return $this->status();
        }

        if (null !== $this->schema->versions) {
            return $this->_list();
        }

        throw new InvalidArgumentException();
    }

    private function status(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Version\Status
    {
        $status = strtolower($this->schema->defaultStatus ?? '');

        return match ($status) {
            'affected' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Version\Status::withAffected(),
            'unaffected' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Version\Status::withUnaffected(),
            'unknown' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Version\Status::withUnknown(),
            default => throw new InvalidArgumentException(),
        };
    }

    private function _list(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Version\_List
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Version\_List(
            $this->versions(),
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Version\Version>
     */
    private function versions(): ArrayCollection
    {
        if (null === $this->schema->versions) {
            throw new InvalidArgumentException();
        }

        $elements = array_map(
            static fn (Schema\AffectedVersion $node) => new Version($node)->toPersistence(),
            array_values($this->schema->versions),
        );

        return new ArrayCollection($elements);
    }
}
