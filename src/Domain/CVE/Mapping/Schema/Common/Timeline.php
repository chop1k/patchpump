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
        $timestamp = new Timestamp($this->schema->time);

        return new Persistence\Common\Timeline(
            $this->schema->lang,
            $this->schema->value,
            $timestamp->toDateTimeImmutable()
        );
    }
}
