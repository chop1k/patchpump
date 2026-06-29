<?php

declare(strict_types=1);

namespace App\Domain\Monitoring\Task;

final readonly class CancelledTask
{
    public function __construct(
        public TaskDefinition $definition,
        /**
         * @var array<non-empty-string, string> $arguments
         */
        public array $arguments,
    ) {
    }
}
