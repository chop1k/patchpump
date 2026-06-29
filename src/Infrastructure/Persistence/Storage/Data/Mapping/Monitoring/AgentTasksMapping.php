<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring;

use App\Domain\Monitoring\AgentTasks;
use App\Domain\Monitoring\Task\CancelledTask;
use App\Domain\Monitoring\Task\FinishedTask;
use App\Domain\Monitoring\Task\PendingTask;
use App\Domain\Monitoring\Task\RunningTask;
use App\Domain\Monitoring\Task\TaskDefinition;
use App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring\Task\CanceledTaskMapping;
use App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring\Task\FinishedTaskMapping;
use App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring\Task\PendingTaskMapping;
use App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring\Task\RunningTaskMapping;
use App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring\Task\TaskDefinitionMapping;

final readonly class AgentTasksMapping
{
    public function __construct(
        public array $data,
    ) {
    }

    public static function fromObject(AgentTasks $tasks): self
    {
        $definitions = array_map(static fn (TaskDefinition $task) => TaskDefinitionMapping::fromObject($task), $tasks->definitions);
        $pending = array_map(static fn (PendingTask $task) => PendingTaskMapping::fromObject($task), $tasks->pending);
        $running = array_map(static fn (RunningTask $task) => RunningTaskMapping::fromObject($task), $tasks->running);
        $finished = array_map(static fn (FinishedTask $task) => FinishedTaskMapping::fromObject($task), $tasks->finished);
        $cancelled = array_map(static fn (CancelledTask $task) => CanceledTaskMapping::fromObject($task), $tasks->cancelled);

        $data = [
            'definitions' => $definitions,
            'pending' => $pending,
            'running' => $running,
            'finished' => $finished,
            'cancelled' => $cancelled,
        ];

        return new self($data);
    }

    public function toObject(): AgentTasks
    {
        $definitions = array_map(static fn (array $data) => new TaskDefinitionMapping($data)->toObject(), $this->data['definitions']);
        $pending = array_map(static fn (array $data) => new PendingTaskMapping($data)->toObject(), $this->data['pending']);
        $running = array_map(static fn (array $data) => new RunningTaskMapping($data)->toObject(), $this->data['running']);
        $finished = array_map(static fn (array $data) => new FinishedTaskMapping($data)->toObject(), $this->data['finished']);
        $cancelled = array_map(static fn (array $data) => new CanceledTaskMapping($data)->toObject(), $this->data['cancelled']);

        return new AgentTasks(
            definitions: $definitions,
            pending: $pending,
            running: $running,
            finished: $finished,
            cancelled: $cancelled,
        );
    }
}
