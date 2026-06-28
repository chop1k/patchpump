<?php

declare(strict_types=1);

namespace App\Domain\Monitoring\Task;

use InvalidArgumentException;

final readonly class TaskDefinition
{
    public function __construct(
        /**
         * @var non-empty-string $tool
         */
        public string $tool,
        /**
         * @var non-empty-string $name
         */
        public string $name,
        /**
         * @var non-empty-string|null $description
         */
        public ?string $description,
        /**
         * @var array<non-negative-int, string> $arguments
         */
        public array $arguments,
    ) {
    }

    public function assign(array $arguments): PendingTask
    {
        foreach ($this->arguments as $name) {
            $there = $arguments[$name] ?? false;

            if (false === $there) {
                throw new InvalidArgumentException($name);
            }
        }

        return new PendingTask(
            definition: $this,
            arguments: $arguments
        );
    }
}
