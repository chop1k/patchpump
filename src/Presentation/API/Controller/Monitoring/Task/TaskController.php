<?php

declare(strict_types=1);

namespace App\Presentation\API\Controller\Monitoring\Task;

use SleekDB\Store;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/monitoring/agents/{agent_id}/tasks', name: 'api_monitoring_agents_tasks_', format: 'json')]
final class TaskController extends AbstractController
{
    public function __construct(
        #[Autowire(service: 'app.storage.agents')]
        private Store $storage,
    ) {
    }

    #[Route('', name: 'create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
    }
}
