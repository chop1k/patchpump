<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization;

/**
 * @template T
 */
final readonly class Result
{
    public function __construct(
        /**
         * @var non-negative-int $status
         */
        private int $status,
        /**
         * @var T $record
         */
        private mixed $record,
    ) {
    }

    public function created(): bool
    {
        return $this->status === 1;
    }

    public function updated(): bool
    {
        return $this->status === 2;
    }

    /**
     * @return T
     */
    public function record(): mixed
    {
        return $this->record;
    }
}
