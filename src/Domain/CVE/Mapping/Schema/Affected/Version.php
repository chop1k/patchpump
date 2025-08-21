<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Affected;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @internal
 */
final readonly class Version
{
    public function __construct(
        private Schema\AffectedVersion $schema,
    ) {
    }

    public function toPersistence(): Persistence\Affected\Version\Version
    {
        $status = strtolower($this->schema->status ?? '');

        return match ($status) {
            'unknown' => $this->unknown(),
            'affected' => $this->affected(),
            'unaffected' => $this->unaffected(),
            default => throw new \InvalidArgumentException(),
        };
    }

    private function affected(): Persistence\Affected\Version\Version
    {
        return Persistence\Affected\Version\Version::withAffected(
            $this->version(),
            $this->schema->versionType,
            $this->schema->lessThan,
            $this->schema->lessThanOrEqual,
            $this->changes(),
        );
    }

    private function unaffected(): Persistence\Affected\Version\Version
    {
        return Persistence\Affected\Version\Version::withUnaffected(
            $this->version(),
            $this->schema->versionType,
            $this->schema->lessThan,
            $this->schema->lessThanOrEqual,
            $this->changes(),
        );
    }

    private function unknown(): Persistence\Affected\Version\Version
    {
        return Persistence\Affected\Version\Version::withUnknown(
            $this->version(),
            $this->schema->versionType,
            $this->schema->lessThan,
            $this->schema->lessThanOrEqual,
            $this->changes(),
        );
    }

    private function version(): string
    {
        return $this->schema->version ?? throw new \InvalidArgumentException();
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Affected\Version\Change>|null
     */
    private function changes(): ?ArrayCollection
    {
        if (null === $this->schema->changes) {
            return null;
        }

        $elements = array_map(
            static fn (Schema\AffectedVersionChange $node) => (new Version\Change($node))->toPersistence(),
            array_values($this->schema->changes),
        );

        return new ArrayCollection($elements);
    }
}
