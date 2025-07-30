<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Operations;

use App\Domain\Vulnerabilities\Synchronization\Contracts\OperationInterface;
use App\Domain\Vulnerabilities\Synchronization\Events\RecordAlreadySynchronizedEvent;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * @template T
 */
final readonly class UnchangedOperation implements OperationInterface
{
    public function __construct(
        private EventDispatcherInterface $dispatcher,
        /**
         * @var T $old
         */
        private mixed $old,
        /**
         * @var callable(non-negative-int, T): void $callback
         */
        private mixed $callback
    ) {
    }

    public function execute(): void
    {
        call_user_func($this->callback, 0, $this->old);

        $this->dispatcher->dispatch(new RecordAlreadySynchronizedEvent($this->old));
    }
}