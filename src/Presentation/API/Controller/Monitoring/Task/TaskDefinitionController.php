<?php

declare(strict_types=1);

namespace App\Presentation\API\Controller\Monitoring\Task;

use App\Domain\Monitoring\Agent;
use App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring\AgentMapping;
use SleekDB\Store;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/monitoring/agents/{agent_id}/tasks/definitions', name: 'api_monitoring_tasks_definitions_', format: 'json')]
final class TaskDefinitionController extends AbstractController
{
    public function __construct(
        #[Autowire(service: 'app.storage.agents')]
        private Store $agentsStorage,
        #[Autowire(service: 'app.storage.tasks')]
        private Store $tasksStorage,
    ) {
    }

    #[Route('/{task_position}', name: 'one', methods: ['GET'])]
    public function one(Request $request): JsonResponse
    {
        $agentData = $this->agentsStorage->findById(
            $request->attributes->get('agent_id')
        );
    }

    #[Route('', name: 'collection', methods: ['GET'])]
    public function collection(): JsonResponse
    {
    }

    #[Route('', name: 'create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $agent = $this->agent(
            $request->attributes->get('agent_id')
        );

        return new JsonResponse(
            data: null,
            status: 201
        );
    }

    public function agent(string $id): Agent
    {
        $agentData = $this->agentsStorage->findById($id);

        return new AgentMapping($agentData)
            ->toObject();
    }
}
