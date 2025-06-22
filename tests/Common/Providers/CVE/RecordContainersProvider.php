<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\CVE;

use App\Domain\CVE\Schema\RecordContainers;

final class RecordContainersProvider
{
    public static function provideValid(): array
    {
        $containers_0 = new RecordContainers();

        $containers_0->cna = CNAProvider::provideValid()[0];

        return [
            $containers_0
        ];
    }

    public static function provideInvalid(): array
    {
        $containers_0 = new RecordContainers();

        $containers_0->cna = CNAProvider::provideInvalid()[0];

        $containers_1 = new RecordContainers();

        $containers_1->cna = null;

        $containers_2 = new RecordContainers();

        $containers_2->cna = CNAProvider::provideValid()[0];
        $containers_2->adp = [];

        $containers_3 = new RecordContainers();

        $containers_3->cna = CNAProvider::provideValid()[0];
        $containers_3->adp = [
            null,
        ];

        $containers_4 = new RecordContainers();

        $containers_4->cna = CNAProvider::provideValid()[0];
        $containers_4->adp = [
            true,
        ];

        $containers_5 = new RecordContainers();

        $containers_5->cna = CNAProvider::provideValid()[0];
        $containers_5->adp = [
            null,
            ...CNAProvider::provideValid(),
        ];

        $containers_6 = new RecordContainers();

        $containers_6->cna = CNAProvider::provideValid()[0];
        $containers_6->adp = CNAProvider::provideInvalid();

        return [
            $containers_0,
            $containers_1,
            $containers_2,
            $containers_3,
            $containers_4,
            $containers_5,
            $containers_6,
        ];
    }
}