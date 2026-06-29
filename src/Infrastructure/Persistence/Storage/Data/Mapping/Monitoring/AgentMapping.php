<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring;

use App\Domain\Monitoring\Agent;

final readonly class AgentMapping
{
    public function __construct(
        public array $data,
    ) {
    }

    public static function fromObject(Agent $agent): self
    {
        $data = [
            'name' => $agent->name,
            'description' => $agent->description,
            'tasks' => AgentTasksMapping::fromObject($agent->tasks),
        ];

        return new self($data);
    }

    public function toObject(): Agent
    {
        $tasks = AgentTasksMapping::fromObject($this->data['tasks']);

        return new Agent(
            name: $this->data['name'],
            description: $data['description'] ?? null,
            tasks: $tasks->toObject(),
        );
    }
}
