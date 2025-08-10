<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\CPEApplicability;

if (false === function_exists('provide_valid_cpe_applicability')) {
    /**
     * @return CPEApplicability[]
     */
    function provide_valid_cpe_applicability(): array
    {
        $applicability_0 = new CPEApplicability();

        $applicability_0->nodes = provide_valid_cpe_nodes();

        $applicability_1 = new CPEApplicability();

        $applicability_1->operator = 'AND';
        $applicability_1->nodes = provide_valid_cpe_nodes();

        $applicability_2 = new CPEApplicability();

        $applicability_2->operator = 'OR';
        $applicability_2->nodes = provide_valid_cpe_nodes();

        $applicability_3 = new CPEApplicability();

        $applicability_3->negate = true;
        $applicability_3->nodes = provide_valid_cpe_nodes();

        $applicability_4 = new CPEApplicability();

        $applicability_4->negate = false;
        $applicability_4->nodes = provide_valid_cpe_nodes();

        return [
            $applicability_0,
            $applicability_1,
            $applicability_2,
            $applicability_3,
            $applicability_4,
        ];
    }
}

if (false === function_exists('provide_invalid_cpe_applicability')) {
    /**
     * @return CPEApplicability[]
     */
    function provide_invalid_cpe_applicability(): array
    {
        $applicability_0 = new CPEApplicability();

        $applicability_0->operator = '';
        $applicability_0->nodes = provide_valid_cpe_nodes();

        $applicability_1 = new CPEApplicability();

        $applicability_1->operator = '123';
        $applicability_1->nodes = provide_valid_cpe_nodes();

        $applicability_2 = new CPEApplicability();

        $applicability_2->nodes = [
            null,
        ];

        $applicability_3 = new CPEApplicability();

        $applicability_3->nodes = [
            '123',
        ];

        $applicability_4 = new CPEApplicability();

        $applicability_4->nodes = provide_invalid_cpe_nodes();

        $applicability_5 = new CPEApplicability();

        $applicability_5->nodes = [
            null,
            ...provide_invalid_cpe_nodes(),
            null,
        ];

        return [
            $applicability_0,
            $applicability_1,
            $applicability_2,
            $applicability_3,
            $applicability_4,
            $applicability_5,
        ];
    }
}
