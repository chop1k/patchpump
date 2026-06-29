<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring\Task;

use App\Domain\Monitoring\Task\PendingTask;

final readonly class PendingTaskMapping
{
    public function __construct(
        public array $data,
    ) {
    }

    public static function fromObject(PendingTask $task): self
    {
        $data = [
            'arguments' => $task->arguments,
        ];

        return new self($data);
    }

    public function toObject(): PendingTask
    {
        $definition = new TaskDefinitionMapping($this->data['definition']);

        return new PendingTask(
            definition: $definition->toObject(),
            arguments: $this->data['arguments'],
        );
    }
}
