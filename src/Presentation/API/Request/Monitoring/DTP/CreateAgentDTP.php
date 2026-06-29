<?php

declare(strict_types=1);

namespace App\Presentation\API\Request\Monitoring\DTP;

final readonly class CreateAgentDTP
{
    public function __construct(
        public string $name,
        public ?string $description,
    ) {
    }
}
