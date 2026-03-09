<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Result;

use App\Domain\Vulnerabilities\Contracts\SynchronizationResultInterface;
use Override;

/**
 * @template T
 */
final readonly class RecordCreated implements SynchronizationResultInterface
{
    public function __construct(
        /**
         * @var T $record
         */
        private mixed $record,
    ) {
    }

    /**
     * @return T
     */
    #[Override]
    public function record(): mixed
    {
        return $this->record;
    }
}
