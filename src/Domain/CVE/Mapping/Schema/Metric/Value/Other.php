<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Metric\Value;

use App\Domain\CVE\Schema;
use InvalidArgumentException;

final readonly class Other
{
    public function __construct(
        private Schema\Other $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Metric\Value\Other
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Metric\Value\Other(
            $this->type(),
            $this->content(),
        );
    }

    private function type(): string
    {
        return $this->schema->type ?? throw new InvalidArgumentException();
    }

    private function content(): array
    {
        return $this->schema->content ?? throw new InvalidArgumentException();
    }
}
