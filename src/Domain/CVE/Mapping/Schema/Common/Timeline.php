<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Common;

use App\Domain\CVE\Mapping\Common\Timestamp;
use App\Domain\CVE\Schema;
use DateTimeImmutable;
use InvalidArgumentException;

/**
 * @internal
 */
final readonly class Timeline
{
    public function __construct(
        private Schema\Timeline $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Timeline
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Timeline(
            $this->language(),
            $this->value(),
            $this->timestamp(),
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

    private function timestamp(): DateTimeImmutable
    {
        if (null === $this->schema->time) {
            throw new InvalidArgumentException();
        }

        return new Timestamp($this->schema->time)->toDateTimeImmutable();
    }
}
