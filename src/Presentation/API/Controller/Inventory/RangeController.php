<?php

declare(strict_types=1);

namespace App\Presentation\API\Controller\Inventory;

use SleekDB\Store;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/inventory/ranges', name: 'api_inventory_range_', format: 'json')]
class RangeController extends AbstractController
{
    public function __construct(
        #[Autowire(service: 'app.storage.ranges')]
        private Store $storage,
    ) {
    }

    #[Route('/{range_id}', name: 'one', methods: ['GET'])]
    public function one(Request $request): JsonResponse
    {
        // id
        // value
        // type (domain, network, etc)
        $rangeId = $request->attributes->get('range_id');

        return new JsonResponse(
            $this->storage->findById($rangeId)
        );
    }

    #[Route('', name: 'collection', methods: ['GET'])]
    public function collection(): JsonResponse
    {
        return new JsonResponse(
            $this->storage->findAll()
        );
    }

    #[Route('', name: 'create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $body = $request->getPayload();

        $range = [
            'value' => $body->get('value'),
            'type' => $body->get('type'),
        ];

        return new JsonResponse(
            data: $this->storage->insert($range),
            status: 201
        );
    }

    #[Route('/{range_id}', name: 'remove', methods: ['DELETE'])]
    public function remove(Request $request): JsonResponse
    {
        $id = $request->attributes->get('range_id');

        $this->storage->deleteById($id);

        return new Response(
            status: 204
        );
    }
}
