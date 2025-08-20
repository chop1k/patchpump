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
        return new Persistence\Affected\Version\Version(
            $this->schema->version,
            $this->status(),
            $this->schema->versionType,
            $this->schema->lessThan,
            $this->schema->lessThanOrEqual,
            $this->changes(),
        );
    }

    private function status(): Persistence\Affected\Affection
    {
        $status = strtolower($this->schema->status ?? '');

        return match ($status) {
            'unknown' => Persistence\Affected\Affection::Unknown,
            'affected' => Persistence\Affected\Affection::Affected,
            'unaffected' => Persistence\Affected\Affection::Unaffected,
            default => null,
        };
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
            $this->schema->changes,
        );

        return new ArrayCollection($elements);
    }
}
