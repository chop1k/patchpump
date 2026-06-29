<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring\Task;

use App\Domain\Monitoring\Task\FinishedTask;

final readonly class FinishedTaskMapping
{
    public function __construct(
        public array $data,
    ) {
    }

    public static function fromObject(FinishedTask $task): self
    {
        $data = [
            'arguments' => $task->arguments,
        ];

        return new self($data);
    }

    public function toObject(): FinishedTask
    {
        $definition = new TaskDefinitionMapping($this->data['definition']);

        return new FinishedTask(
            definition: $definition->toObject(),
            arguments: $this->data['arguments'],
            artifacts: []
        );
    }
}
