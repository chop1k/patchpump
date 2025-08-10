<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\ProblemType;

if (false === function_exists('provide_valid_problem_types')) {
    /**
     * @return ProblemType[]
     */
    function provide_valid_problem_types(): array
    {
        $type_0 = new ProblemType();

        $type_0->descriptions = provide_valid_problem_descriptions();

        return [
            $type_0,
        ];
    }
}

if (false === function_exists('provide_invalid_problem_types')) {
    /**
     * @return ProblemType[]
     */
    function provide_invalid_problem_types(): array
    {
        $type_0 = new ProblemType();

        $type_0->descriptions = provide_invalid_problem_descriptions();

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
            ...provide_valid_problem_descriptions(),
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
