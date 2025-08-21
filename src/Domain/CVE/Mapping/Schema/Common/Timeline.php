<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Common;

use App\Domain\CVE\Mapping\Common\Timestamp;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

/**
 * @internal
 */
final readonly class Timeline
{
    public function __construct(
        private Schema\Timeline $schema,
    ) {
    }

    public function toPersistence(): Persistence\Common\Timeline
    {
        return new Persistence\Common\Timeline(
            $this->language(),
            $this->value(),
            $this->timestamp(),
        );
    }

    private function language(): string
    {
        return $this->schema->lang ?? throw new \InvalidArgumentException();
    }

    private function value(): string
    {
        return $this->schema->value ?? throw new \InvalidArgumentException();
    }

    private function timestamp(): \DateTimeImmutable
    {
        if (null === $this->schema->time) {
            throw new \InvalidArgumentException();
        }

        return (new Timestamp($this->schema->time))->toDateTimeImmutable();
    }
}
