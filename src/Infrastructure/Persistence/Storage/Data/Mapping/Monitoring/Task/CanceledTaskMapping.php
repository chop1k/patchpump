<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring\Task;

use App\Domain\Monitoring\Task\CancelledTask;

final readonly class CanceledTaskMapping
{
    public function __construct(
        public array $data,
    ) {
    }

    public static function fromObject(CancelledTask $task): self
    {
        $data = [
            'arguments' => $task->arguments,
        ];

        return new self($data);
    }

    public function toObject(): CancelledTask
    {
        $definition = new TaskDefinitionMapping($this->data['definition']);

        return new CancelledTask(
            definition: $definition->toObject(),
            arguments: $this->data['arguments'],
        );
    }
}
