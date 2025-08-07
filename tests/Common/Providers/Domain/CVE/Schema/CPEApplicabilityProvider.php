<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\Domain\CVE\Schema;

use App\Domain\CVE\Schema\CPEApplicability;

final class CPEApplicabilityProvider
{
    /**
     * @return CPEApplicability[]
     */
    public static function provideValid(): array
    {
        $applicability_0 = new CPEApplicability();

        $applicability_0->nodes = CPENodeProvider::provideValid();

        $applicability_1 = new CPEApplicability();

        $applicability_1->operator = 'AND';
        $applicability_1->nodes = CPENodeProvider::provideValid();

        $applicability_2 = new CPEApplicability();

        $applicability_2->operator = 'OR';
        $applicability_2->nodes = CPENodeProvider::provideValid();

        $applicability_3 = new CPEApplicability();

        $applicability_3->negate = true;
        $applicability_3->nodes = CPENodeProvider::provideValid();

        $applicability_4 = new CPEApplicability();

        $applicability_4->negate = false;
        $applicability_4->nodes = CPENodeProvider::provideValid();

        return [
            $applicability_0,
            $applicability_1,
            $applicability_2,
            $applicability_3,
            $applicability_4,
        ];
    }

    /**
     * @return CPEApplicability[]
     */
    public static function provideInvalid(): array
    {
        $applicability_0 = new CPEApplicability();

        $applicability_0->operator = '';
        $applicability_0->nodes = CPENodeProvider::provideValid();

        $applicability_1 = new CPEApplicability();

        $applicability_1->operator = '123';
        $applicability_1->nodes = CPENodeProvider::provideValid();

        $applicability_2 = new CPEApplicability();

        $applicability_2->nodes = [
            null,
        ];

        $applicability_3 = new CPEApplicability();

        $applicability_3->nodes = [
            '123',
        ];

        $applicability_4 = new CPEApplicability();

        $applicability_4->nodes = CPENodeProvider::provideInvalid();

        $applicability_5 = new CPEApplicability();

        $applicability_5->nodes = [
            null,
            ...CPENodeProvider::provideInvalid(),
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
