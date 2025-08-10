<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\ProblemDescription;

if (false === function_exists('provide_valid_problem_descriptions')) {
    /**
     * @return ProblemDescription[]
     */
    function provide_valid_problem_descriptions(): array
    {
        $description_0 = new ProblemDescription();

        $description_0->lang = 'en';
        $description_0->description = 'This is a description';

        $description_1 = new ProblemDescription();

        $description_1->lang = 'en';
        $description_1->description = 'This is a description';
        $description_1->cweId = 'CWE-12';

        $description_2 = new ProblemDescription();

        $description_2->lang = 'en';
        $description_2->description = 'This is a description';
        $description_2->references = provide_valid_references();

        $description_3 = new ProblemDescription();

        $description_3->lang = 'en';
        $description_3->description = 'This is a description';
        $description_3->type = '123';

        $description_4 = new ProblemDescription();

        $description_4->lang = 'en';
        $description_4->description = 'This is a description';
        $description_4->references = provide_valid_references();

        return [
            $description_0,
            $description_1,
            $description_2,
            $description_3,
            $description_4,
        ];
    }
}

if (false === function_exists('provide_invalid_problem_descriptions')) {
    /**
     * @return ProblemDescription[]
     */
    function provide_invalid_problem_descriptions(): array
    {
        $description_0 = new ProblemDescription();

        $description_0->lang = null;
        $description_0->description = null;

        $description_1 = new ProblemDescription();

        $description_1->lang = 'en';
        $description_1->description = null;

        $description_2 = new ProblemDescription();

        $description_2->lang = null;
        $description_2->description = 'en';

        $description_3 = new ProblemDescription();

        $description_3->lang = 'en';
        $description_3->description = '';

        $description_4 = new ProblemDescription();

        $description_4->lang = 'en';
        $description_4->description = '123';
        $description_4->cweId = '123';

        $description_5 = new ProblemDescription();

        $description_5->lang = 'en';
        $description_5->description = '123';
        $description_5->cweId = '';

        $description_6 = new ProblemDescription();

        $description_6->lang = 'en';
        $description_6->description = '123';
        $description_6->type = '';

        $description_7 = new ProblemDescription();

        $description_7->lang = 'en';
        $description_7->description = '123';
        $description_7->references = provide_invalid_references();

        $description_8 = new ProblemDescription();

        $description_8->lang = 'en';
        $description_8->description = '123';
        $description_8->references = [];

        $description_9 = new ProblemDescription();

        $description_9->lang = 'en';
        $description_9->description = '123';
        $description_9->references = [
            null,
        ];

        $description_10 = new ProblemDescription();

        $description_10->lang = 'en';
        $description_10->description = '123';
        $description_10->references = [
            true,
        ];

        $description_11 = new ProblemDescription();

        $description_11->lang = 'en';
        $description_11->description = '123';
        $description_11->references = [
            null,
            ...provide_valid_references(),
        ];

        return [
            $description_0,
            $description_1,
            $description_2,
            $description_3,
            $description_4,
            $description_5,
            $description_6,
            $description_7,
            $description_8,
            $description_9,
            $description_10,
            $description_11,
        ];
    }
}
