<?php

declare(strict_types=1);

namespace App\Domain\Monitoring\Task;

final readonly class PendingTask
{
    public function __construct(
        public TaskDefinition $definition,
        /**
         * @var array<non-empty-string, string> $arguments
         */
        public array $arguments,
    ) {
    }

    public function run(): RunningTask
    {
        return new RunningTask(
            definition: $this->definition,
            arguments: $this->arguments
        );
    }

    public function cancel(): CancelledTask
    {
        return new CancelledTask(
            definition: $this->definition,
            arguments: $this->arguments
        );
    }
}
