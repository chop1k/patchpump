<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring\Task;

use App\Domain\Monitoring\Task\RunningTask;

final readonly class RunningTaskMapping
{
    public function __construct(
        public array $data,
    ) {
    }

    public static function fromObject(RunningTask $task): self
    {
        $data = [
            'arguments' => $task->arguments,
        ];

        return new self($data);
    }

    public function toObject(): RunningTask
    {
        $definition = new TaskDefinitionMapping($this->data['definition']);

        return new RunningTask(
            definition: $definition->toObject(),
            arguments: $this->data['arguments'],
        );
    }
}
