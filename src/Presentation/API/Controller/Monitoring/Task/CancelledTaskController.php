<?php

declare(strict_types=1);

namespace App\Presentation\API\Controller\Monitoring\Task;

use App\Domain\Scanning\Agent;
use InvalidArgumentException;
use SleekDB\Store;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/monitoring/agents/{agent_id}/tasks/cancelled', name: 'api_monitoring_tasks_cancelled_', format: 'json')]
final readonly class CancelledTaskController
{
    public function __construct(
        #[Autowire(service: 'app.storage.agents')]
        private Store $storage,
    ) {
    }

    #[Route('/{task_position}', name: 'one', methods: ['GET'])]
    public function one(Request $request): JsonResponse
    {
        $agentId = $request->attributes->get('agent_id');

        $agentData = $this->storage->findById($agentId);

        if (null === $agentData) {
            throw new InvalidArgumentException();
        }

        $agent = Agent::fromArray($agentData);

        $taskPosition = $request->attributes->get('task_position');

        $task = $agent->tasks->cancelled[$taskPosition];

        return new JsonResponse(
            $task->toArray()
        );
    }

    #[Route('', name: 'collection', methods: ['GET'])]
    public function collection(Request $request): JsonResponse
    {
        $agentId = $request->attributes->get('agent_id');

        $agentData = $this->storage->findById($agentId);

        if (null === $agentData) {
            throw new InvalidArgumentException();
        }

        $agent = Agent::fromArray($agentData);

        $tasks = array_map(static fn ($task) => $task->toArray(), $agent->tasks->cancelled);

        return new JsonResponse($tasks);
    }
}
