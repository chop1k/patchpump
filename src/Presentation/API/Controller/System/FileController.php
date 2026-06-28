<?php

declare(strict_types=1);

namespace App\Presentation\API\Controller\System;

use SleekDB\Store;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/system/files', name: 'api_system_files_', format: 'json')]
final class FileController extends AbstractController
{
    public function __construct(
        #[Autowire(service: 'app.storage.files')]
        private Store $storage,
    ) {
    }

    #[Route('/{file_id}', name: 'one', methods: ['GET'])]
    public function one(Request $request): JsonResponse
    {
        return new JsonResponse([
            'id' => 1,
            'path' => '/some/path',
            'size' => 123,
            'content-type' => 'plain/text',
            'options' => [
                'type' => 0, // local
            ],
            'token' => 'jb2rb2jrjv54bljkvc',
        ]);
    }

    #[Route('/{file_id}/content/{token}', name: 'download', methods: ['GET'])]
    public function download(Request $request): BinaryFileResponse
    {
    }

    #[Route('/{file_id}', name: 'create', methods: ['POST'])]
    public function create(Request $request): Response
    {
    }

    #[Route('/{file_id}/content/{token}', name: 'upload', methods: ['POST'])]
    public function upload(Request $request): Response
    {
    }

    #[Route('', name: 'colection', methods: ['GET'])]
    public function collection(Request $request): JsonResponse
    {
        return new JsonResponse([
            [
                'id' => 1,
                'path' => '',
                'size' => 123,
                'content-type' => 'plain/text',
                'options' => [
                    'type' => 0, // local
                ],
            ],
            [
                'id' => 2,
                'path' => '',
                'size' => 321,
                'content-type' => 'plain/text',
                'options' => [
                    'type' => 1, // s3
                ],
            ],
        ]);
    }
}
