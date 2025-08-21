<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Affected;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @internal
 */
final readonly class Affected
{
    public function __construct(
        private Schema\Affected $schema,
    ) {
    }

    public function toPersistence(): Persistence\Affected\AbstractAffected
    {
        if (null !== $this->schema->vendor && null !== $this->schema->product) {
            return $this->product();
        }

        if (null !== $this->schema->packageName && null !== $this->schema->collectionURL) {
            return $this->package();
        }

        throw new \InvalidArgumentException();
    }

    private function product(): Persistence\Affected\Product
    {
        if (null === $this->schema->vendor || null === $this->schema->product) {
            throw new \InvalidArgumentException();
        }

        return new Persistence\Affected\Product(
            new Persistence\Affected\Subject\Product(
                $this->schema->vendor,
                $this->schema->product,
                $this->schema->collectionURL,
                $this->schema->packageName,
            ),
            $this->source(),
            $this->enumeration(),
        );
    }

    private function package(): Persistence\Affected\Package
    {
        if (null === $this->schema->packageName || null === $this->schema->collectionURL) {
            throw new \InvalidArgumentException();
        }

        return new Persistence\Affected\Package(
            new Persistence\Affected\Subject\Package(
                $this->schema->collectionURL,
                $this->schema->packageName,
                $this->schema->vendor,
                $this->schema->product,
            ),
            $this->source(),
            $this->enumeration(),
        );
    }

    private function source(): Persistence\Affected\Source
    {
        return (new Source($this->schema))->toPersistence();
    }

    private function enumeration(): Persistence\Affected\Enumeration
    {
        return new Persistence\Affected\Enumeration(
            $this->container(),
            $this->schema->cpes,
            $this->schema->platforms,
        );
    }

    /**
     * @return Persistence\Affected\Version\Status|Persistence\Affected\Version\_List
     */
    private function container(): mixed
    {
        if (null !== $this->schema->defaultStatus) {
            return $this->status();
        }

        if (null !== $this->schema->versions) {
            return $this->_list();
        }

        throw new \InvalidArgumentException();
    }

    private function status(): Persistence\Affected\Version\Status
    {
        $status = strtolower($this->schema->defaultStatus ?? '');

        return match ($status) {
            'affected' => Persistence\Affected\Version\Status::withAffected(),
            'unaffected' => Persistence\Affected\Version\Status::withUnaffected(),
            'unknown' => Persistence\Affected\Version\Status::withUnknown(),
            default => throw new \InvalidArgumentException(),
        };
    }

    private function _list(): Persistence\Affected\Version\_List
    {
        return new Persistence\Affected\Version\_List(
            $this->versions(),
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Affected\Version\Version>
     */
    private function versions(): ArrayCollection
    {
        if (null === $this->schema->versions) {
            throw new \InvalidArgumentException();
        }

        $elements = array_map(
            static fn (Schema\AffectedVersion $node) => (new Version($node))->toPersistence(),
            array_values($this->schema->versions),
        );

        return new ArrayCollection($elements);
    }
}
