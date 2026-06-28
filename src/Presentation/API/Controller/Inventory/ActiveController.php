<?php

declare(strict_types=1);

namespace App\Presentation\API\Controller\Inventory;

use SleekDB\Store;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/inventory/actives', name: 'api_inventory_active_', format: 'json')]
class ActiveController extends AbstractController
{
    public function __construct(
        #[Autowire(service: 'app.storage.actives')]
        private Store $storage,
    ) {
    }

    #[Route('/{active_id}', name: 'one', methods: ['GET'])]
    public function one(Request $request): JsonResponse
    {
    }

    #[Route('', name: 'collection', methods: ['GET'])]
    public function collection(Request $request): JsonResponse
    {
    }

    #[Route('', name: 'create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
    }

    #[Route('/{active_id}', name: 'update', methods: ['PUT', 'PATCH'])]
    public function update(Request $request): JsonResponse
    {
    }

    #[Route('/{active_id}', name: 'remove', methods: ['DELETE'])]
    public function remove(Request $request): JsonResponse
    {
    }
}
