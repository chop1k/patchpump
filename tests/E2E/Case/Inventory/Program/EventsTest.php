<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\Inventory\Program;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

/**
 * @psalm-api
 */
final class EventsTest extends ApiTestCase
{
    public function testItLogsCreationEvents(): void
    {
    }

    public function testItLogsModificationEvents(): void
    {
    }

    public function testItLogsDeletionEvents(): void
    {
    }

    public function testItNotLogsCreationEvents(): void
    {
        // if event logging is turned off at all
        // if creation event logging is turned off
    }

    public function testItNotLogsModificationEvents(): void
    {
        // if event logging is turned off at all
        // if modification event logging is turned off
    }

    public function testItNotLogsDeletionEvents(): void
    {
        // if event logging is turned off at all
        // if deletion event logging is turned off
    }
}
