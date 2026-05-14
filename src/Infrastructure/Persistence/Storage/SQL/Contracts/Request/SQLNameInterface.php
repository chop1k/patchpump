<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQLContracts\SQLRequest;

interface SQLNameInterface
{
    /**
     * @return non-empty-string
     */
    public function engine(): string;

    /**
     * // todo: special type for this array.
     *
     * @return non-empty-array<non-negative-int, non-empty-string>
     */
    public function floors(): array;
}
