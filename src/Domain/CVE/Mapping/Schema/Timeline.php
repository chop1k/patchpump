<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

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

    public function toPersistence(): Persistence\Timeline
    {
        $persistence = new Persistence\Timeline();

        $persistence->setLanguage($this->schema->lang);
        $persistence->setContent($this->schema->value);

        if (null !== $this->schema->time) {
            $timestamp = new Timestamp($this->schema->time);

            try {
                $persistence->setTimestamp($timestamp->toDateTimeImmutable());
            } catch (\InvalidArgumentException) {
                $persistence->setTimestamp(null);
            }
        }

        return $persistence;
    }
}
