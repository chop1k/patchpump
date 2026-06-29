<?php

declare(strict_types=1);

namespace App\Domain\Monitoring;

final readonly class Agent
{
    public function __construct(
        /**
         * @var non-empty-string $name
         */
        public string $name,
        /**
         * @var non-empty-string|null $description
         */
        public ?string $description,
        public AgentTasks $tasks,
    ) {
    }
}
