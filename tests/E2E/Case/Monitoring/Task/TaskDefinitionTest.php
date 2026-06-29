<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\Monitoring;

use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @psalm-api
 */
final class TaskDefinitionTest extends WebTestCase
{
    private const headers = [
        'accept' => 'application/json',
        'content-type' => 'application/json',
    ];

    #[DataProvider('creationProvider')]
    public function testCreation(array $agent, array $definition): void
    {
        $client = self::createClient();

        $client
            ->jsonRequest('POST', '/api/agents', $agent, self::headers);

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/json');

        $id = json_decode($client->getResponse()->getContent(), true)['_id'];

        $client
            ->jsonRequest('POST', "/api/agents/$id/tasks/definitions", $definition, self::headers);

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/json');
    }

    public static function creationProvider(): array
    {
        return [
            0 => [
                [
                    'name' => '123',
                    'description' => '321',
                    'tasks' => [
                        'definitions' => [],
                        'pending' => [],
                        'running' => [],
                        'finished' => [],
                        'cancelled' => [],
                    ],
                ],
                [
                    'tool' => '123',
                    'name' => '123',
                    'description' => '321',
                    'arguments' => [
                        'target',
                    ],
                ],
            ],
        ];
    }
}
