<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\IAM\Role;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

/**
 * @psalm-api
 */
final class PermissionTest extends ApiTestCase
{
    public function testItGrantsPermissions(): void
    {
    }

    public function testItNotGrantsPermissions(): void
    {
        // if it is owner role
        // if current user have to rights to grant roles
        // if current user wants to grant higher permissions than it currently have
    }

    public function testItRevokesPermissions(): void
    {
    }

    public function testItNotRevokesPermissions(): void
    {
        // if it is owner role
    }
}
