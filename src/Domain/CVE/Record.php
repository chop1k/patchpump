<?php

declare(strict_types=1);

namespace App\Domain\CVE;

use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

final class Record
{
    public function __construct(
        private ?EventDispatcherInterface $eventDispatcher = null,
    ) {
    }

    public function remove(): void
    {
    }

    public function update(\App\Domain\CVE\Schema\Record $record): void
    {
    }

    public function persist(): void
    {
    }
}
