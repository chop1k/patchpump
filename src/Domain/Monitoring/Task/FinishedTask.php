<?php

declare(strict_types=1);

namespace App\Domain\Monitoring\Task;

final readonly class FinishedTask
{
    public function __construct(
        public TaskDefinition $definition,
        /**
         * @var array<non-empty-string, string> $arguments
         */
        public array $arguments,
        /**
         * @var array<non-negative-int, Artifact> $artifacts
         */
        public array $artifacts,
    ) {
    }

    public static function withArtifact(self $task, Artifact $artifact): self
    {
        return self::withArtifacts($task, [$artifact]);
    }

    public static function withArtifacts(self $task, array $artifacts): self
    {
        return new self(
            definition: $task->definition,
            arguments: $task->arguments,
            artifacts: array_merge($task->artifacts, $artifacts)
        );
    }
}
