<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\CPE;

use App\Domain\CVE\Schema;
use InvalidArgumentException;

/**
 * @internal
 */
final readonly class _Match
{
    public function __construct(
        private Schema\CPEMatch $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\CPE\_Match
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\CPE\_Match(
            $this->vulnerable(),
            $this->criteria(),
            $this->schema->matchCriteriaId,
            $this->schema->versionStartIncluding,
            $this->schema->versionStartExcluding,
            $this->schema->versionEndIncluding,
            $this->schema->versionEndExcluding
        );
    }

    private function vulnerable(): bool
    {
        return $this->schema->vulnerable ?? throw new InvalidArgumentException();
    }

    private function criteria(): string
    {
        return $this->schema->criteria ?? throw new InvalidArgumentException();
    }
}
