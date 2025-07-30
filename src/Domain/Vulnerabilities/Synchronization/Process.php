<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization;

use App\Domain\Vulnerabilities\Synchronization\Contracts\ComparatorInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\PersistenceInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use Generator;
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
        /**
         * @var non-negative-int $batchSize
         */
        private int $batchSize,
    ) {
    }

    /**
     * @return Generator<Result<T>>
     */
    public function generator(): Generator
    {
        $batching = new Batching($this->batchSize);

        foreach ($this->source->generator() as $id => $new) {
            $batch = $batching->batch();

            $factory = $batch->factory(
                $this->eventDispatcher,
                $this->persistence,
                $this->comparator,
            );

            $factory->operation($id, $new)
                ->execute();

            if ($batch->exceeds() === true) {
                $this->persistence->flush();
                $this->persistence->clear();

                yield from $batch->generator();
            }
        }
    }
}
