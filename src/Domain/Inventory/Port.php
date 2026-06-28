<?php

declare(strict_types=1);

namespace App\Domain\Inventory;

final readonly class Port
{
    public function __construct(
        /**
         * @var non-negative-integer $number
         */
        public int $number,
        /**
         * @var non-empty-string|null $service
         */
        public ?string $service,
    ) {
    }
}
