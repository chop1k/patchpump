<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Operations;

use App\Domain\Vulnerabilities\Synchronization\Contracts\OperationInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\Persistence\WriteOperationInterface;
use App\Domain\Vulnerabilities\Synchronization\Events\RecordCreatedEvent;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * @template T
 */
final readonly class CreateOperation implements OperationInterface
{
    public function __construct(
        private EventDispatcherInterface $dispatcher,
        /**
         * @var WriteOperationInterface<T> $persistence
         */
        private WriteOperationInterface $persistence,
        /**
         * @var T $new
         */
        private mixed $new,
        /**
         * @var callable(non-negative-int, T): void $callback
         */
        private mixed $callback
    ) {
    }

    public function execute(): void
    {
        $this->persistence->create($this->new);

        call_user_func($this->callback, 1, $this->new);

        $this->dispatcher->dispatch(new RecordCreatedEvent($this->new));
    }
}