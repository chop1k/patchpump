<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\IAM\User;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use App\Tests\E2E\Case\IAM\User\Cases\UserCases;
use JsonException;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * @psalm-api
 */
final class BasicTest extends ApiTestCase
{
    /**
     * @throws TransportExceptionInterface
     * @throws JsonException
     */
    #[DataProvider('itGetsCollectionProvider')]
    public function testItGetsCollection(string $path, array $json): void
    {
        $client = self::createClient();

        $client->request('GET', $path);

        self::assertResponseIsSuccessful();
        self::assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');

        self::assertJsonEquals($json);
    }

    /**
     * @throws JsonException
     * @throws TransportExceptionInterface
     */
    #[DataProvider('itGetsOneUserProvider')]
    public function testItGetsOneUser(string $path, array $json): void
    {
        $client = self::createClient();

        $client->request('GET', $path);

        self::assertResponseIsSuccessful();
        self::assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');

        self::assertJsonEquals($json);
    }

    public function testItCreatesUser(): void
    {
    }

    public function testItUpdatesUser(): void
    {
    }

    public function testItDeletesUser(): void
    {
    }

    public function testItCannotCreateUser(): void
    {
    }

    public function testItCannotUpdateUser(): void
    {
    }

    public function testItCannotDeleteUser(): void
    {
    }

    public static function itGetsCollectionProvider(): iterable
    {
        return UserCases::GET_COLLECTION;
    }

    public static function itGetsOneUserProvider(): iterable
    {
        return UserCases::ONE;
    }
}
