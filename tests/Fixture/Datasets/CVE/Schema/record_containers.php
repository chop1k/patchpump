<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\RecordContainers;

if (false === function_exists('provide_valid_record_containers')) {
    /**
     * @return RecordContainers[]
     */
    function provide_valid_record_containers(): array
    {
        $containers_0 = new RecordContainers();

        $containers_0->cna = provide_valid_cna()[0];

        return [
            $containers_0,
        ];
    }
}

if (false === function_exists('provide_invalid_record_containers')) {
    /**
     * @return RecordContainers[]
     */
    function provide_invalid_record_containers(): array
    {
        $containers_0 = new RecordContainers();

        $containers_0->cna = provide_invalid_cna()[0];

        $containers_1 = new RecordContainers();

        $containers_1->cna = null;

        $containers_2 = new RecordContainers();

        $containers_2->cna = provide_valid_cna()[0];
        $containers_2->adp = [];

        $containers_3 = new RecordContainers();

        $containers_3->cna = provide_valid_cna()[0];
        $containers_3->adp = [
            null,
        ];

        $containers_4 = new RecordContainers();

        $containers_4->cna = provide_valid_cna()[0];
        $containers_4->adp = [
            true,
        ];

        $containers_5 = new RecordContainers();

        $containers_5->cna = provide_valid_cna()[0];
        $containers_5->adp = [
            null,
            ...provide_valid_cna(),
        ];

        $containers_6 = new RecordContainers();

        $containers_6->cna = provide_valid_cna()[0];
        $containers_6->adp = provide_invalid_cna();

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
