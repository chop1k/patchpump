<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Result;

use App\Domain\Vulnerabilities\Contracts\SynchronizationResultInterface;
use Override;

/**
 * @template T
 */
final readonly class RecordUpdated implements SynchronizationResultInterface
{
    public function __construct(
        /**
         * @var T $old
         */
        private mixed $old,
        /**
         * @var T $new
         */
        private mixed $new,
    ) {
    }

    /**
     * @return T
     */
    public function old(): mixed
    {
        return $this->old;
    }

    /**
     * @return T
     */
    #[Override]
    public function record(): mixed
    {
        return $this->new;
    }
}
