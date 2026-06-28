<?php

declare(strict_types=1);

namespace App\Presentation\API\Controller\Monitoring;

use App\Infrastructure\Persistence\Storage\Data\Mapping\Monitoring\AgentMapping;
use SleekDB\Store;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/monitoring/agents', name: 'api_monitoring_agents_', format: 'json')]
final class AgentController extends AbstractController
{
    public function __construct(
        #[Autowire(service: 'app.storage.agents')]
        private Store $agentsStorage,
    ) {
    }

    #[Route('/{agent_id}', name: 'one', methods: ['GET'])]
    public function one(Request $request): JsonResponse
    {
        $id = $request->attributes->get('agent_id');

        return new JsonResponse(
            $this->agentsStorage->findById($id)
        );
    }

    #[Route('', name: 'collection', methods: ['GET'])]
    public function collection(): JsonResponse
    {
        return new JsonResponse(
            $this->agentsStorage->findAll()
        );
    }

    #[Route('', name: 'create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = [
            'name' => $request->attributes->get('name'),
            'description' => $request->attributes->get('description'),
        ];

        $agent = new AgentMapping($data)
            ->toObject();

        $this->agentsStorage->insert($data);

        return new JsonResponse($data, status: 201);
    }
}
