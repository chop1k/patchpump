<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization;

final class Batching
{
    private ?Batch $batch = null;

    public function __construct(
        /**
         * @var non-negative-int $batchSize
         */
        private readonly int $batchSize,
    ) {
    }

    public function batch(): Batch
    {
        if ($this->batch === null) {
            $this->batch = new Batch($this->batchSize);

            return $this->batch;
        }

        if ($this->batch->exceeds() === true) {
            unset($this->batch);

            $this->batch = new Batch($this->batchSize);

            return $this->batch;
        }

        return $this->batch;
    }
}