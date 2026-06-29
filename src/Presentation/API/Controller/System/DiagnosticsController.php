<?php

declare(strict_types=1);

namespace App\Presentation\API\Controller\System;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/system/diagnostics', name: 'api_system_diagnostics_', format: 'json')]
class DiagnosticsController extends AbstractController
{
    public function __construct(
    ) {
    }

    #[Route('/healthcheck', name: 'healthcheck', methods: ['GET'])]
    public function healthcheck(Request $request): JsonResponse
    {
    }

    #[Route('/networking', name: 'networking', methods: ['GET'])]
    public function networking(Request $request): JsonResponse
    {
        return new JsonResponse([
            'address' => '0.0.0.0',
            'ports' => [
                80,
                443,
            ],
            'protocols' => [
                'available' => [
                    'http',
                    'https',
                    'fcgi',
                ],
                'enabled' => [
                    'https',
                ],
            ],
        ]);
    }

    #[Route('/platform', name: 'platform', methods: ['GET'])]
    public function platform(Request $request): JsonResponse
    {
    }

    #[Route('/application', name: 'application', methods: ['GET'])]
    public function application(Request $request): JsonResponse
    {
        return new JsonResponse([
            'name' => 'patchpump',
            'build' => [
                'version' => [
                    'name' => 'v0.0.1',
                    'commit' => 'c849252',
                ],
                'checksum' => [
                    'sha256' => 'f94fd02d6a88a951ba2302f0a9a5e9ba3f06eb89640f54ca6043671f8a213c7e',
                ],
                'timestamp' => 1777545706,
            ],
            'environment' => [
                'profile' => 'prod',
            ],
            'modules' => [
                'available' => [
                    'org.pp.core.artifacts.Storage',
                    'org.pp.agent.Integration',
                ],
                'enabled' => [
                    'org.pp.core.artifacts.Storage',
                    'org.pp.agent.Integration',
                ],
            ],
        ]);
    }

    #[Route('/maintenance', name: 'maintenance', methods: ['GET'])]
    public function maintenance(Request $request): JsonResponse
    {
    }
}
