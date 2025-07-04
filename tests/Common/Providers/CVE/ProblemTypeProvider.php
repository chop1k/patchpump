<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\CVE;

use App\Domain\CVE\Schema\ProblemType;

final class ProblemTypeProvider
{
    /**
     * @return ProblemType[]
     */
    public static function provideValid(): array
    {
        $type_0 = new ProblemType();

        $type_0->descriptions = ProblemDescriptionProvider::provideValid();

        return [
            $type_0,
        ];
    }

    /**
     * @return ProblemType[]
     */
    public static function provideInvalid(): array
    {
        $type_0 = new ProblemType();

        $type_0->descriptions = ProblemDescriptionProvider::provideInvalid();

        $type_1 = new ProblemType();

        $type_1->descriptions = [];

        $type_2 = new ProblemType();

        $type_2->descriptions = [
            null,
        ];

        $type_3 = new ProblemType();

        $type_3->descriptions = [
            '124',
        ];

        $type_4 = new ProblemType();

        $type_4->descriptions = [
            null,
            ...ProblemDescriptionProvider::provideValid()
        ];

        return [
            $type_0,
            $type_1,
            $type_2,
            $type_3,
            $type_4,
        ];
    }
}