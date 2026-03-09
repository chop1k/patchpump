<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\Common\Credit as Wrapped;
use App\Domain\CVE\Schema;

final readonly class Credit
{
    public function __construct(
        private string $providedBy,
        private Schema\Credit $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Credit
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Credit(
            $this->providedBy,
            $this->credit(),
        );
    }

    private function credit(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        return new Wrapped($this->schema)->toPersistence();
    }
}
