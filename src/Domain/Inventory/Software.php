<?php

declare(strict_types=1);

namespace App\Domain\Inventory;

final readonly class Software
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
        /**
         * @var non-empty-string $version
         */
        public string $version,
        /**
         * @var non-empty-string|null $release
         */
        public ?string $release,
        /**
         * @var non-empty-string $arch
         */
        public string $arch,
        /**
         * @var non-empty-string $managedBy
         */
        public string $managedBy,
    ) {
    }
}
