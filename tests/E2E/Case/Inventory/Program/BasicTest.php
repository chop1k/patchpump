<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\Inventory\Program;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

/**
 * @psalm-api
 */
final class BasicTest extends ApiTestCase
{
    public function testItGetsCollection(): void
    {
    }

    public function testItGetsOneProgram(): void
    {
    }

    public function testItCreatesProgram(): void
    {
    }

    public function testItUpdatesProgram(): void
    {
    }

    public function testItDeletesProgram(): void
    {
    }

    public function testItNotGetsCollection(): void
    {
        // does not have permissions to read at all
        // does not have permissions to read in inventorization
        // does not have permissions to read programs from that particular active
        // does not have permissions to read programs from that particular project
        // does not have permissions to read programs from that particular organization
    }

    public function testItNotGetsOneProgram(): void
    {
        // does not have permissions to read at all
        // does not have permissions to read in inventorization
        // does not have permissions to read programs from that particular active
        // does not have permissions to read programs from that particular project
        // does not have permissions to read programs from that particular organization
    }

    public function testItNotCreatesProgram(): void
    {
        // does not have permissions to create programs at all
        // does not have permissions to create programs in inventorization
        // does not have permissions to create programs in that particular active
        // does not have permissions to create programs in that particular project
        // does not have permissions to create programs in that particular organization
    }

    public function testItNotUpdatesProgram(): void
    {
        // does not have permissions to update programs at all
        // does not have permissions to update programs in inventorization
        // does not have permissions to update programs in that particular active
        // does not have permissions to update programs in that particular project
        // does not have permissions to update programs in that particular organization
    }

    public function testItNotDeletesProgram(): void
    {
        // does not have permissions to delete programs at all
        // does not have permissions to delete programs in inventorization
        // does not have permissions to delete programs in that particular active
        // does not have permissions to delete programs in that particular project
        // does not have permissions to delete programs in that particular organization
    }
}
