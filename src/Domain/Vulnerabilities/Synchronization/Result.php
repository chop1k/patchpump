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
        return 1 === $this->status;
    }

    public function updated(): bool
    {
        return 2 === $this->status;
    }

    /**
     * @return T
     */
    public function record(): mixed
    {
        return $this->record;
    }
}
