<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\Inventory\Project;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

/**
 * @psalm-api
 */
final class BasicTest extends ApiTestCase
{
    public function testItGetsCollection(): void
    {
    }

    public function testItGetsOneProject(): void
    {
    }

    public function testItCreatesProject(): void
    {
    }

    public function testItUpdatesProject(): void
    {
    }

    public function testItDeletesProject(): void
    {
    }

    public function testItNotGetsCollection(): void
    {
        // does not have permissions to read at all
        // does not have permissions to read in inventorization
        // does not have permissions to read projects from that particular organization
    }

    public function testItNotGetsOneProject(): void
    {
        // does not have permissions to read at all
        // does not have permissions to read in inventorization
        // does not have permissions to read projects from that particular organization
    }

    public function testItNotCreatesProject(): void
    {
        // does not have permissions to create at all
        // does not have permissions to create projects in inventorization
        // does not have permissions to create projects in that particular organization
    }

    public function testItNotUpdatesProject(): void
    {
        // does not have permissions to update at all
        // does not have permissions to update projects in inventorization
        // does not have permissions to update projects in that particular organization
    }

    public function testItNotDeletesProject(): void
    {
        // does not have permissions to delete at all
        // does not have permissions to delete projects in inventorization
        // does not have permissions to delete projects in that particular organization
    }
}
