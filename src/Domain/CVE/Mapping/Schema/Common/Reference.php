<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Common;

use App\Domain\CVE\Schema;
use InvalidArgumentException;

/**
 * @internal
 */
final readonly class Reference
{
    public function __construct(
        private Schema\Reference $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Reference
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Reference(
            $this->url(),
            $this->schema->name,
            $this->schema->tags,
        );
    }

    private function url(): string
    {
        return $this->schema->url ?? throw new InvalidArgumentException();
    }
}
