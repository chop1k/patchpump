<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Common\Description;

use App\Domain\CVE\Schema;
use InvalidArgumentException;

/**
 * @internal
 */
final readonly class Media
{
    public function __construct(
        private Schema\DescriptionMedia $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Description\Media
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Description\Media(
            $this->type(),
            $this->value(),
            $this->schema->base64
        );
    }

    private function type(): string
    {
        return $this->schema->type ?? throw new InvalidArgumentException();
    }

    private function value(): string
    {
        return $this->schema->value ?? throw new InvalidArgumentException();
    }
}
