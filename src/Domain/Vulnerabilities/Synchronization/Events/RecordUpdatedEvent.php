<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Events;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * @template T
 */
final class RecordUpdatedEvent extends Event
{
    public function __construct(
        /**
         * @var T $old
         */
        public readonly mixed $old,
        /**
         * @var T $new
         */
        public readonly mixed $new,
    ) {
    }
}
