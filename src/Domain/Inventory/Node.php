<?php

declare(strict_types=1);

namespace App\Domain\Inventory;

final readonly class Node
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
         * @var non-empty-string $address
         */
        public string $address,
        /**
         * @var array<non-negative-int, Port> $ports
         */
        public array $ports,
    ) {
    }

    public function tags(): array
    {
        $tags = [];

        foreach ($this->ports as $port) {
            $tag = match ($port->number) {
                default => null,
            };

            if (null === $tag) {
                continue;
            }

            $tags[] = $tag;
        }

        return array_unique($tags);
    }
}
