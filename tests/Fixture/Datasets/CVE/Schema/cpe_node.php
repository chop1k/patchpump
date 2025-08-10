<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\CPENode;

if (false === function_exists('provide_valid_cpe_nodes')) {
    /**
     * @return CPENode[]
     */
    function provide_valid_cpe_nodes(): array
    {
        $node_0 = new CPENode();

        $node_0->negate = true;
        $node_0->operator = 'AND';
        $node_0->cpeMatch = provide_valid_cpe_matches();

        $node_1 = new CPENode();

        $node_1->negate = false;
        $node_1->operator = 'AND';
        $node_1->cpeMatch = provide_valid_cpe_matches();

        $node_2 = new CPENode();

        $node_2->negate = true;
        $node_2->operator = 'OR';
        $node_2->cpeMatch = provide_valid_cpe_matches();

        return [
            $node_0,
            $node_1,
            $node_2,
        ];
    }
}

if (false === function_exists('provide_invalid_cpe_nodes')) {
    /**
     * @return CPENode[]
     */
    function provide_invalid_cpe_nodes(): array
    {
        $node_0 = new CPENode();

        $node_0->negate = false;
        $node_0->operator = null;
        $node_0->cpeMatch = provide_valid_cpe_matches();

        $node_1 = new CPENode();

        $node_1->negate = null;
        $node_1->operator = null;
        $node_1->cpeMatch = provide_valid_cpe_matches();

        $node_2 = new CPENode();

        $node_2->negate = true;
        $node_2->operator = '123';
        $node_2->cpeMatch = provide_valid_cpe_matches();

        $node_3 = new CPENode();

        $node_3->negate = true;
        $node_3->operator = '';
        $node_3->cpeMatch = provide_valid_cpe_matches();

        $node_4 = new CPENode();

        $node_4->negate = true;
        $node_4->operator = 'AND';
        $node_4->cpeMatch = [
            '123',
        ];

        $node_5 = new CPENode();

        $node_5->negate = true;
        $node_5->operator = 'AND';
        $node_5->cpeMatch = [
            ...provide_valid_cpe_matches(),
            null,
        ];

        $node_6 = new CPENode();

        $node_6->negate = true;
        $node_6->operator = 'AND';
        $node_6->cpeMatch = [
            null,
            ...provide_valid_cpe_matches(),
            null,
        ];

        $node_7 = new CPENode();

        $node_7->negate = true;
        $node_7->operator = 'AND';
        $node_7->cpeMatch = provide_invalid_cpe_matches();

        return [
            $node_0,
            $node_1,
            $node_2,
            $node_3,
            $node_4,
            $node_5,
            $node_6,
            $node_7,
        ];
    }
}
