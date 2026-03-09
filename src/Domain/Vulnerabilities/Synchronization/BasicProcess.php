<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization;

use App\Domain\Vulnerabilities\Contracts\SynchronizationProcessInterface;
use App\Domain\Vulnerabilities\Contracts\SynchronizationResultInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\ComparatorInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\PersistenceInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Domain\Vulnerabilities\Synchronization\Events\RecordAlreadySynchronizedEvent;
use App\Domain\Vulnerabilities\Synchronization\Events\RecordCreatedEvent;
use App\Domain\Vulnerabilities\Synchronization\Events\RecordUpdatedEvent;
use App\Domain\Vulnerabilities\Synchronization\Result\RecordCreated;
use App\Domain\Vulnerabilities\Synchronization\Result\RecordUnchanged;
use App\Domain\Vulnerabilities\Synchronization\Result\RecordUpdated;
use Generator;
use InvalidArgumentException;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * @template T
 *
 * @implements SynchronizationProcessInterface<T>
 */
abstract readonly class BasicProcess implements SynchronizationProcessInterface
{
    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
        /**
         * @var SourceInterface<T> $source
         */
        private SourceInterface $source,
        /**
         * @var PersistenceInterface<T> $persistence
         */
        private PersistenceInterface $persistence,
        /**
         * @var ComparatorInterface<T> $comparator
         */
        private ComparatorInterface $comparator,
    ) {
    }

    /**
     * @return Generator<non-negative-int, SynchronizationResultInterface<T>>
     */
    public function generator(): Generator
    {
        $index = 0;

        foreach ($this->source->generator() as $id => $new) {
            try {
                $old = $this->persistence->get($id);

                if ($this->comparator->newer($old, $new)) {
                    yield $index => $this->updateOperation($old, $new);
                } else {
                    yield $index => $this->unchangedOperation($old);
                }
            } catch (InvalidArgumentException) {
                yield $index => $this->createOperation($new);
            } finally {
                ++$index;
            }
        }
    }

    /**
     * @param T $old
     * @param T $new
     *
     * @return SynchronizationResultInterface<T>
     */
    protected function updateOperation(mixed $old, mixed $new): SynchronizationResultInterface
    {
        $this->persistence->update($new);

        $this->eventDispatcher->dispatch(new RecordUpdatedEvent($old, $new));

        return new RecordUpdated($old, $new);
    }

    /**
     * @param T $old
     *
     * @return SynchronizationResultInterface<T>
     */
    protected function unchangedOperation(mixed $old): SynchronizationResultInterface
    {
        $this->eventDispatcher->dispatch(new RecordAlreadySynchronizedEvent($old));

        return new RecordUnchanged($old);
    }

    /**
     * @param T $new
     *
     * @return SynchronizationResultInterface<T>
     */
    protected function createOperation(mixed $new): SynchronizationResultInterface
    {
        $this->persistence->create($new);

        $this->eventDispatcher->dispatch(new RecordCreatedEvent($new));

        return new RecordCreated($new);
    }
}
