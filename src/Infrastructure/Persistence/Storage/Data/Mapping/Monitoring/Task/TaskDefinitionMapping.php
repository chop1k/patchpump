<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring\Task;

use App\Domain\Monitoring\Task\TaskDefinition;

final readonly class TaskDefinitionMapping
{
    public function __construct(
        public array $data,
    ) {
    }

    public static function fromObject(TaskDefinition $definition): self
    {
        $data = [
            'tool' => $definition->tool,
            'name' => $definition->name,
            'description' => $definition->description,
            'arguments' => $definition->arguments,
        ];

        return new self($data);
    }

    public function toObject(): TaskDefinition
    {
        return new TaskDefinition(
            tool: $this->data['tool'],
            name: $this->data['name'],
            description: $this->data['description'] ?? null,
            arguments: $this->data['arguments'],
        );
    }
}
