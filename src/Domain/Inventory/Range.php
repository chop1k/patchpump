<?php

declare(strict_types=1);

namespace App\Domain\Inventory;

final readonly class Range
{
    public function __construct(
        /**
         * @var non-empty-string $value
         */
        public string $value,
        /**
         * @var non-empty-string $type
         */
        public string $type,
    ) {
    }
}
