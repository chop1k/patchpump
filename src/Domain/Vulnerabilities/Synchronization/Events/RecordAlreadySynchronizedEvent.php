<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Events;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * @template T
 */
final class RecordAlreadySynchronizedEvent extends Event
{
    public function __construct(
        /**
         * @var T $record
         */
        public readonly mixed $record,
    ) {
    }
}
