<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\Impact;

if (false === function_exists('provide_valid_impacts')) {
    /**
     * @return Impact[]
     */
    function provide_valid_impacts(): array
    {
        $impact_0 = new Impact();

        $impact_0->capecId = 'CAPEC-123';
        $impact_0->descriptions = provide_valid_descriptions();

        return [
            $impact_0,
        ];
    }
}

if (false === function_exists('provide_invalid_impacts')) {
    /**
     * @return Impact[]
     */
    function provide_invalid_impacts(): array
    {
        $impact_0 = new Impact();

        $impact_0->capecId = 'CAPEC-123456';
        $impact_0->descriptions = provide_valid_descriptions();

        $impact_1 = new Impact();

        $impact_1->capecId = '';
        $impact_1->descriptions = provide_valid_descriptions();

        $impact_2 = new Impact();

        $impact_2->capecId = 'CAPEC-123';
        $impact_2->descriptions = provide_invalid_descriptions();

        $impact_3 = new Impact();

        $impact_3->capecId = 'CAPEC-123';
        $impact_3->descriptions = null;

        $impact_4 = new Impact();

        $impact_4->capecId = null;
        $impact_4->descriptions = null;

        $impact_5 = new Impact();

        $impact_5->capecId = 'CAPEC-123';
        $impact_5->descriptions = [];

        $impact_6 = new Impact();

        $impact_6->capecId = 'CAPEC-123';
        $impact_6->descriptions = [
            null,
        ];

        $impact_7 = new Impact();

        $impact_7->capecId = 'CAPEC-123';
        $impact_7->descriptions = [
            '123',
            '123',
        ];

        return [
            $impact_0,
            $impact_1,
            $impact_2,
            $impact_3,
            $impact_4,
            $impact_5,
            $impact_6,
            $impact_7,
        ];
    }
}
