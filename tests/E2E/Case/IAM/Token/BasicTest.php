<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\IAM\Token;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

/**
 * @psalm-api
 */
final class BasicTest extends ApiTestCase
{
    public function testItGetsCollection(): void
    {
    }

    public function testItGetsToken(): void
    {
    }

    public function testItCreatesToken(): void
    {
    }

    public function testItDeletesToken(): void
    {
    }

    public function testItNotGetsCollection(): void
    {
        // current token does not have permissions to get tokens
        // current user does not have permission to get tokens
    }

    public function testItNotGetsToken(): void
    {
        // current token does not have permissions to get token
        // current user does not have permission to get token
    }

    public function testItNotCreatesToken(): void
    {
        // current token does not have permissions to create tokens
        // current user does not have permission to create tokens
    }

    public function testItNotDeletesToken(): void
    {
        // current token does not have permissions to delete tokens
        // current user does not have permission to delete tokens
    }
}
