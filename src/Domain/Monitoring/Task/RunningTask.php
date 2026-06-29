<?php

declare(strict_types=1);

namespace App\Domain\Monitoring\Task;

final readonly class RunningTask
{
    public function __construct(
        public TaskDefinition $definition,
        /**
         * @var array<non-empty-string, string> $arguments
         */
        public array $arguments,
    ) {
    }

    public function finish(array $artifacts): FinishedTask
    {
        return new FinishedTask(
            definition: $this->definition,
            arguments: $this->arguments,
            artifacts: $artifacts
        );
    }
}
