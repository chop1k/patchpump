<?php

declare(strict_types=1);

namespace App\Domain\Inventory;

final readonly class Active
{
    public function __construct(
        /**
         * @var non-empty-string $name
         */
        public string $name,
        /**
         * @var non-empty-string|null $description
         */
        public ?string $description,
        public Node $node,
        /**
         * @var array<non-negative-int, Software> $software
         */
        public array $software,
    ) {
    }
}
