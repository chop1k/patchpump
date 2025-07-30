<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization;

use App\Domain\Vulnerabilities\Synchronization\Contracts\ComparatorInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\PersistenceInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Domain\Vulnerabilities\Synchronization\Events\RecordAlreadySynchronizedEvent;
use App\Domain\Vulnerabilities\Synchronization\Events\RecordCreatedEvent;
use App\Domain\Vulnerabilities\Synchronization\Events\RecordUpdatedEvent;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * @template T
 */
final readonly class Process
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
     * @param non-negative-int $limit
     *
     * @return \Generator<Result<T>>
     */
    public function generator(int $limit): \Generator
    {
        $generator = $this->source->generator();

        $buffer = [];

        while (true) {
            if ($generator->valid() === false || count($buffer) > $limit) {
                $this->persistence->flush();
                $this->persistence->clear();

                yield from $buffer;

                $buffer = [];
            }

            if ($generator->valid() === false) {
                break;
            }

            /**
             * @var string $id
             */
            $id = $generator->key();
            /**
             * @var T $new
             */
            $new = $generator->current();

            try {
                $old = $this->persistence->get($id);

                if ($this->comparator->newer($old, $new)) {
                    $buffer[] = $this->updateOperation($old, $new);
                } else {
                    $buffer[] = $this->unchangedOperation($old);
                }
            } catch (\InvalidArgumentException) {
                $buffer[] = $this->createOperation($new);
            } finally {
                $generator->next();
            }
        }
    }

    /**
     * @param T $old
     * @param T $new
     *
     * @return Result<T>
     */
    private function updateOperation(mixed $old, mixed $new): Result
    {
        $this->persistence->update($new);

        $this->eventDispatcher->dispatch(new RecordUpdatedEvent($old, $new));

        return new Result(2, $new);
    }

    /**
     * @param T $old
     *
     * @return Result<T>
     */
    private function unchangedOperation(mixed $old): Result
    {
        $this->eventDispatcher->dispatch(new RecordAlreadySynchronizedEvent($old));

        return new Result(0, $old);
    }

    /**
     * @param T $new
     *
     * @return Result<T>
     */
    private function createOperation(mixed $new): Result
    {
        $this->persistence->create($new);

        $this->eventDispatcher->dispatch(new RecordCreatedEvent($new));

        return new Result(1, $new);
    }
}
