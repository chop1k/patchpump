<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\Monitoring;

use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @psalm-api
 */
final class AgentTest extends WebTestCase
{
    private const writeHeaders = [
        'accept' => 'application/json',
        'content-type' => 'application/json',
    ];

    private const readHeaders = [
        'accept' => 'application/json',
    ];

    #[DataProvider('creationProvider')]
    public function testGetOne(array $payload): void
    {
        $client = self::createClient();

        $client
            ->jsonRequest('POST', '/api/agents', $payload, self::writeHeaders);

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/json');

        $id = json_decode($client->getResponse()->getContent(), true)['_id'];

        $client
            ->request('GET', "/api/agents/$id", server: self::readHeaders);

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(200);
        $this->assertResponseHeaderSame('content-type', 'application/json');
    }

    #[DataProvider('creationProvider')]
    public function testCreation(array $payload): void
    {
        self::createClient()
            ->jsonRequest('POST', '/api/agents', $payload, self::writeHeaders);

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
            ],
            1 => [
                [
                    'name' => '123',
                    'tasks' => [
                        'definitions' => [],
                        'pending' => [],
                        'running' => [],
                        'finished' => [],
                        'cancelled' => [],
                    ],
                ],
            ],
            2 => [
                [
                    'name' => '123',
                    'description' => '321',
                    'tasks' => [
                        'definitions' => [
                            0 => [
                                'tool' => 'nmap',
                                'name' => '123',
                                'description' => '321',
                                'arguments' => [
                                    'target',
                                ],
                            ],
                        ],
                        'pending' => [
                            0 => [
                                'definition' => [
                                    'tool' => 'nmap',
                                    'name' => '123',
                                    'description' => '321',
                                    'arguments' => [
                                        'target',
                                    ],
                                ],
                                'arguments' => [
                                    'target' => '192.168.0.1/24',
                                ],
                            ],
                        ],
                        'running' => [
                            0 => [
                                'definition' => [
                                    'tool' => 'nmap',
                                    'name' => '123',
                                    'description' => '321',
                                    'arguments' => [
                                        'target',
                                    ],
                                ],
                                'arguments' => [
                                    'target' => '192.168.0.1/24',
                                ],
                            ],
                        ],
                        'finished' => [
                            0 => [
                                'definition' => [
                                    'tool' => 'nmap',
                                    'name' => '123',
                                    'description' => '321',
                                    'arguments' => [
                                        'target',
                                    ],
                                ],
                                'arguments' => [
                                    'target' => '192.168.0.1/24',
                                ],
                                'artifacts' => [],
                            ],
                        ],
                        'cancelled' => [
                            0 => [
                                'definition' => [
                                    'tool' => 'nmap',
                                    'name' => '123',
                                    'description' => '321',
                                    'arguments' => [
                                        'target',
                                    ],
                                ],
                                'arguments' => [
                                    'target' => '192.168.0.1/24',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
