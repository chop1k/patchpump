<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization;

use App\Domain\Vulnerabilities\Synchronization\Contracts\ComparatorInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\PersistenceInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * @template T
 */
final class Batch
{
    /**
     * @var list<Result> $buffer
     */
    private array $buffer = [];

    public function __construct(
        /**
         * @var non-negative-int $limit
         */
        private readonly int $limit,
    ) {
    }

    /**
     * @param EventDispatcherInterface $dispatcher
     * @param PersistenceInterface<T> $persistence
     * @param ComparatorInterface<T> $comparator
     *
     * @return Factory
     */
    public function factory(EventDispatcherInterface $dispatcher, PersistenceInterface $persistence, ComparatorInterface $comparator): Factory
    {
        $buffer = &$this->buffer;

        /**
         * @param non-negative-int $status
         * @param T $record
         *
         * @return void
         */
        $callback = static function (int $status, mixed $record) use (&$buffer): void {
            $buffer[] = new Result($status, $record);
        };

        return new Factory(
            $dispatcher,
            $persistence,
            $comparator,
            $callback,
        );
    }

    public function exceeds(): bool
    {
        return count($this->buffer) >= $this->limit;
    }

    /**
     * @return \Generator<Result<T>>
     */
    public function generator(): \Generator
    {
        foreach ($this->buffer as $result) {
            yield $result;
        }
    }
}