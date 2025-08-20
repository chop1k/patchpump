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
        return new Persistence\Affected\Source(
            $this->schema->repo,
            $this->schema->modules,
            $this->schema->programFiles,
            $this->schema->programRoutines,
        );
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

        return new Persistence\Affected\Version\Status(
            match ($status) {
                'affected' => Persistence\Affected\Affection::Affected,
                'unaffected' => Persistence\Affected\Affection::Unaffected,
                'unknown' => Persistence\Affected\Affection::Unknown,
                default => throw new \InvalidArgumentException(),
            }
        );
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
        $elements = array_map(
            static fn (Schema\AffectedVersion $node) => (new Version($node))->toPersistence(),
            $this->schema->versions,
        );

        return new ArrayCollection($elements);
    }
}
