<?php

declare(strict_types=1);

namespace App\Domain\Monitoring;

use App\Domain\Monitoring\Task\CancelledTask;
use App\Domain\Monitoring\Task\FinishedTask;
use App\Domain\Monitoring\Task\PendingTask;
use App\Domain\Monitoring\Task\RunningTask;
use App\Domain\Monitoring\Task\TaskDefinition;

final readonly class AgentTasks
{
    public function __construct(
        /**
         * @var array<non-negative-int, TaskDefinition> $definitions
         */
        public array $definitions,
        /**
         * @var array<non-negative-int, PendingTask> $pending
         */
        public array $pending,
        /**
         * @var array<non-negative-int, RunningTask> $running
         */
        public array $running,
        /**
         * @var array<non-negative-int, FinishedTask> $finished
         */
        public array $finished,
        /**
         * @var array<non-negative-int, CancelledTask> $cancelled
         */
        public array $cancelled,
    ) {
    }

    public static function withDefinition(self $tasks, TaskDefinition $definition): self
    {
        return self::withDefinitions($tasks, [$definition]);
    }

    public static function withDefinitions(self $tasks, array $definitions): self
    {
        return new self(
            definitions: array_merge($tasks->definitions, $definitions),
            pending: $tasks->pending,
            running: $tasks->running,
            finished: $tasks->finished,
            cancelled: $tasks->cancelled,
        );
    }

    public static function withPending(self $tasks, PendingTask $pending): self
    {
        return self::withPendings($tasks, [$pending]);
    }

    public static function withPendings(self $tasks, array $pendings): self
    {
        return new self(
            definitions: $tasks->definitions,
            pending: array_merge($tasks->pending, $pendings),
            running: $tasks->running,
            finished: $tasks->finished,
            cancelled: $tasks->cancelled,
        );
    }

    public static function withRunning(self $tasks, RunningTask $running): self
    {
        return self::withRunnings($tasks, [$running]);
    }

    public static function withRunnings(self $tasks, array $runnings): self
    {
        return new self(
            definitions: $tasks->definitions,
            pending: $tasks->pending,
            running: array_merge($tasks->running, $runnings),
            finished: $tasks->finished,
            cancelled: $tasks->cancelled,
        );
    }

    public static function withFinished(self $tasks, FinishedTask $finished): self
    {
        return self::withFinisheds($tasks, [$finished]);
    }

    public static function withFinisheds(self $tasks, array $finisheds): self
    {
        return new self(
            definitions: $tasks->definitions,
            pending: $tasks->pending,
            running: $tasks->running,
            finished: array_merge($tasks->finished, $finisheds),
            cancelled: $tasks->cancelled,
        );
    }

    public static function withCancelled(self $tasks, CancelledTask $cancelled): self
    {
        return self::withCancelleds($tasks, [$cancelled]);
    }

    public static function withCancelleds(self $tasks, array $cancelleds): self
    {
        return new self(
            definitions: $tasks->definitions,
            pending: $tasks->pending,
            running: $tasks->running,
            finished: $tasks->finished,
            cancelled: array_merge($tasks->cancelled, $cancelleds),
        );
    }
}
