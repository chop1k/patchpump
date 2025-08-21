<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Affected\Version;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

/**
 * @internal
 */
final readonly class Change
{
    public function __construct(
        private Schema\AffectedVersionChange $schema,
    ) {
    }

    public function toPersistence(): Persistence\Affected\Version\Change
    {
        return new Persistence\Affected\Version\Change(
            $this->at(),
            $this->status(),
        );
    }

    private function at(): string
    {
        return $this->schema->at ?? throw new \InvalidArgumentException();
    }

    private function status(): Persistence\Affected\Affection
    {
        $status = strtolower($this->schema->status ?? '');

        return match ($status) {
            'unknown' => Persistence\Affected\Affection::Unknown,
            'affected' => Persistence\Affected\Affection::Affected,
            'unaffected' => Persistence\Affected\Affection::Unaffected,
            default => throw new \InvalidArgumentException(),
        };
    }
}
