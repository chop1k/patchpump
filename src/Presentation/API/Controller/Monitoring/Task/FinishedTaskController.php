<?php

declare(strict_types=1);

namespace App\Presentation\API\Controller\Monitoring\Task;

use SleekDB\Store;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/monitoring/agents/{agent_id}/tasks/finished', name: 'api_monitoring_tasks_finished_', format: 'json')]
final readonly class FinishedTaskController
{
    public function __construct(
        #[Autowire(service: 'app.storage.agents')]
        private Store $storage,
    ) {
    }

    #[Route('/{task_position}', name: 'one', methods: ['GET'])]
    public function one(Request $request): JsonResponse
    {
    }

    #[Route('', name: 'collection', methods: ['GET'])]
    public function collection(): JsonResponse
    {
    }
}
