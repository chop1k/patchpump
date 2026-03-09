<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization;

use App\Domain\Vulnerabilities\Contracts\SynchronizationProcessInterface;
use App\Domain\Vulnerabilities\Contracts\SynchronizationResultInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\PersistenceInterface;
use Generator;
use Override;

/**
 * @template T
 */
final readonly class BatchingProcess implements SynchronizationProcessInterface
{
    public function __construct(
        /**
         * @var SynchronizationProcessInterface<T> $process
         */
        private SynchronizationProcessInterface $process,
        /**
         * @var PersistenceInterface<T> $persistence
         */
        private PersistenceInterface $persistence,
        /**
         * @var non-negative-int $limit
         */
        private int $limit,
    ) {
    }

    /**
     * @return Generator<non-negative-int, SynchronizationResultInterface<T>>
     */
    #[Override]
    public function generator(): Generator
    {
        $buffer = [];

        foreach ($this->process->generator() as $key => $value) {
            $buffer[$key] = $value;

            if (count($buffer) >= $this->limit) {
                $this->persistence->flush();
                $this->persistence->clear();

                yield from $buffer;

                $buffer = [];
            }
        }
    }
}
