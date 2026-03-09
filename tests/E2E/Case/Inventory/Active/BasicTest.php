<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\Inventory\Active;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

/**
 * @psalm-api
 */
final class BasicTest extends ApiTestCase
{
    public function testItGetsCollection(): void
    {
    }

    public function testItGetsOneActive(): void
    {
    }

    public function testItCreatesActive(): void
    {
    }

    public function testItUpdatesActive(): void
    {
    }

    public function testItDeletesActive(): void
    {
    }

    public function testItNotGetsCollection(): void
    {
        // does not have permissions to read at all
        // does not have permissions to read in inventorization
        // does not have permissions to read actives from that particular project
        // does not have permissions to read actives from that particular organization
    }

    public function testItNotGetsOneActive(): void
    {
        // does not have permissions to read at all
        // does not have permissions to read in inventorization
        // does not have permissions to read actives from that particular project
        // does not have permissions to read actives from that particular organization
    }

    public function testItNotCreatesActive(): void
    {
        // does not have permissions to create at all
        // does not have permissions to create actives in inventorization
        // does not have permissions to create actives in that particular project
        // does not have permissions to create actives in that particular organization
    }

    public function testItNotUpdatesActive(): void
    {
        // does not have permissions to update at all
        // does not have permissions to update actives in inventorization
        // does not have permissions to update actives in that particular project
        // does not have permissions to update actives in that particular organization
    }

    public function testItNotDeletesActive(): void
    {
        // does not have permissions to delete at all
        // does not have permissions to delete actives in inventorization
        // does not have permissions to delete actives in that particular project
        // does not have permissions to delete actives in that particular organization
    }
}
