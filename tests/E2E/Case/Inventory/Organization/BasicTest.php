<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\Inventory\Organization;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

/**
 * @psalm-api
 */
final class BasicTest extends ApiTestCase
{
    public function testItGetsCollection(): void
    {
    }

    public function testItGetsOneOrganization(): void
    {
    }

    public function testItCreatesOrganization(): void
    {
    }

    public function testItUpdatesOrganization(): void
    {
    }

    public function testItDeletesOrganization(): void
    {
    }

    public function testItNotGetsCollection(): void
    {
        // does not have permissions to read at all
        // does not have permissions to read in inventorization
    }

    public function testItNotGetsOneOrganization(): void
    {
        // does not have permissions to read at all
        // does not have permissions to read in inventorization
    }

    public function testItNotCreatesOrganization(): void
    {
        // does not have permissions to create at all
        // does not have permissions to create organizations in inventorization
    }

    public function testItNotUpdatesOrganization(): void
    {
        // does not have permissions to update at all
        // does not have permissions to update organizations in inventorization
    }

    public function testItNotDeletesOrganization(): void
    {
        // does not have permissions to delete at all
        // does not have permissions to delete organizations in inventorization
    }
}
