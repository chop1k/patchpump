<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization;

use App\Domain\Vulnerabilities\Synchronization\Contracts\ComparatorInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\OperationInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\PersistenceInterface;
use App\Domain\Vulnerabilities\Synchronization\Operations\CreateOperation;
use App\Domain\Vulnerabilities\Synchronization\Operations\UnchangedOperation;
use App\Domain\Vulnerabilities\Synchronization\Operations\UpdateOperation;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * @template T
 */
final readonly class Factory
{
    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
        /**
         * @var PersistenceInterface<T> $persistence
         */
        private PersistenceInterface $persistence,
        /**
         * @var ComparatorInterface<T> $comparator
         */
        private ComparatorInterface $comparator,
        /**
         * @var callable(non-negative-int, T): void $callback
         */
        private mixed $callback
    ) {
    }

    /**
     * @param T $old
     * @param T $new
     *
     * @return UpdateOperation<T>
     */
    private function updateOperation(mixed $old, mixed $new): UpdateOperation
    {
        return new UpdateOperation(
            $this->eventDispatcher,
            $this->persistence,
            $new,
            $old,
            $this->callback,
        );
    }

    /**
     * @param T $new
     *
     * @return CreateOperation<T>
     */
    private function createOperation(mixed $new): CreateOperation
    {
        return new CreateOperation(
            $this->eventDispatcher,
            $this->persistence,
            $new,
            $this->callback,
        );
    }

    /**
     * @param T $old
     *
     * @return UnchangedOperation<T>
     */
    private function unchangedOperation(mixed $old): UnchangedOperation
    {
        return new UnchangedOperation(
            $this->eventDispatcher,
            $old,
            $this->callback,
        );
    }

    /**
     * @param string $id
     * @param T $new
     *
     * @return OperationInterface
     */
    public function operation(string $id, mixed $new): OperationInterface
    {
        try {
            $old = $this->persistence->get($id);

            if ($this->comparator->newer($old, $new)) {
                return $this->updateOperation($old, $new);
            } else {
                return $this->unchangedOperation($old);
            }
        } catch (\InvalidArgumentException) {
            return $this->createOperation($new);
        }
    }
}