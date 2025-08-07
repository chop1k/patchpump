<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\Domain\CVE\Schema;

use App\Domain\CVE\Schema\CPENode;

final class CPENodeProvider
{
    /**
     * @return CPENode[]
     */
    public static function provideValid(): array
    {
        $node_0 = new CPENode();

        $node_0->negate = true;
        $node_0->operator = 'AND';
        $node_0->cpeMatch = CPEMatchProvider::provideValid();

        $node_1 = new CPENode();

        $node_1->negate = false;
        $node_1->operator = 'AND';
        $node_1->cpeMatch = CPEMatchProvider::provideValid();

        $node_2 = new CPENode();

        $node_2->negate = true;
        $node_2->operator = 'OR';
        $node_2->cpeMatch = CPEMatchProvider::provideValid();

        return [
            $node_0,
            $node_1,
            $node_2,
        ];
    }

    /**
     * @return CPENode[]
     */
    public static function provideInvalid(): array
    {
        $node_0 = new CPENode();

        $node_0->negate = false;
        $node_0->operator = null;
        $node_0->cpeMatch = CPEMatchProvider::provideValid();

        $node_1 = new CPENode();

        $node_1->negate = null;
        $node_1->operator = null;
        $node_1->cpeMatch = CPEMatchProvider::provideValid();

        $node_2 = new CPENode();

        $node_2->negate = true;
        $node_2->operator = '123';
        $node_2->cpeMatch = CPEMatchProvider::provideValid();

        $node_3 = new CPENode();

        $node_3->negate = true;
        $node_3->operator = '';
        $node_3->cpeMatch = CPEMatchProvider::provideValid();

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
            ...CPEMatchProvider::provideValid(),
            null,
        ];

        $node_6 = new CPENode();

        $node_6->negate = true;
        $node_6->operator = 'AND';
        $node_6->cpeMatch = [
            null,
            ...CPEMatchProvider::provideValid(),
            null,
        ];

        $node_7 = new CPENode();

        $node_7->negate = true;
        $node_7->operator = 'AND';
        $node_7->cpeMatch = CPEMatchProvider::provideInvalid();

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
