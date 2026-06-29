<?php

declare(strict_types=1);

namespace App\Presentation\API\Controller\Monitoring;

use App\Domain\Monitoring\Task\FinishedTask;
use SleekDB\Store;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/monitoring/agents/{agent_id}/tasks/finished/{task_position}/artifacts', name: 'api_monitoring_artifacts_', format: 'json')]
final class ArtifactController extends AbstractController
{
    public function __construct(
        #[Autowire(service: 'app.storage.artifacts')]
        private Store $agentsStorage,
        #[Autowire(service: 'app.storage.tasks')]
        private Store $tasksStorage,
    ) {
    }

    #[Route('/{artifact_position}', name: 'one', methods: ['GET'])]
    public function one(Request $request): JsonResponse
    {
        $agentId = $request->attributes->get('agent_id');
        $taskPosition = $request->attributes->get('task_position');
        $artifactPosition = $request->attributes->get('artifact_position');

        $agentData = $this->agentsStorage->findById($agentId);

        $taskId = $agentData['tasks']['finished'][$taskPosition];

        $taskData = $this->tasksStorage->findById($taskId);

        $task = FinishedTask::fromArray($taskData);

        $artifact = $task->artifacts[$artifactPosition];

        return new JsonResponse();
    }

    #[Route('', name: 'collection', methods: ['GET'])]
    public function collection(): JsonResponse
    {
    }

    #[Route('', name: 'create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $agentId = $request->attributes->get('agent_id');
        $taskPosition = $request->attributes->get('task_position');

        $agentData = $this->agentsStorage->findById($agentId);

        $taskId = $agentData['tasks']['finished'][$taskPosition];

        $taskData = $this->tasksStorage->findById($taskId);

        $task = FinishedTask::fromArray($taskData);
        $task = FinishedTask::withArtifact($task, $artifact);
    }
}
