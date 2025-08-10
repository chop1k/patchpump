<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\Metric;

if (false === function_exists('provide_valid_metrics')) {
    /**
     * @return Metric[]
     */
    function provide_valid_metrics(): array
    {
        $metric_0 = new Metric();

        $metric_0->cvssV2_0 = provide_valid_cvss20()[0];

        $metric_1 = new Metric();

        $metric_1->format = '123';
        $metric_1->cvssV2_0 = provide_valid_cvss20()[0];

        $metric_2 = new Metric();

        $metric_2->cvssV3_0 = provide_valid_cvss30()[0];

        $metric_3 = new Metric();

        $metric_3->cvssV3_1 = provide_valid_cvss31()[0];

        $metric_4 = new Metric();

        $metric_4->cvssV4_0 = provide_valid_cvss40()[0];

        $metric_5 = new Metric();

        $metric_5->scenarios = provide_valid_metric_scenarios();
        $metric_5->cvssV4_0 = provide_valid_cvss40()[0];

        return [
            $metric_0,
            $metric_1,
            $metric_2,
            $metric_3,
            $metric_4,
            $metric_5,
        ];
    }
}

if (false === function_exists('provide_invalid_metrics')) {
    /**
     * @return Metric[]
     */
    function provide_invalid_metrics(): array
    {
        $metric_0 = new Metric();

        $metric_0->cvssV2_0 = provide_invalid_cvss20()[0];

        $metric_1 = new Metric();

        $metric_1->cvssV3_0 = provide_invalid_cvss30()[0];

        $metric_2 = new Metric();

        $metric_2->cvssV3_1 = provide_invalid_cvss31()[0];

        $metric_3 = new Metric();

        $metric_3->cvssV4_0 = provide_invalid_cvss40()[0];

        $metric_4 = new Metric();

        $metric_4->cvssV4_0 = provide_invalid_cvss40()[0];
        $metric_4->scenarios = [];

        $metric_5 = new Metric();

        $metric_5->cvssV4_0 = provide_valid_cvss40()[0];
        $metric_5->scenarios = [
            null,
        ];

        $metric_6 = new Metric();

        $metric_6->cvssV4_0 = provide_valid_cvss40()[0];
        $metric_6->scenarios = [
            true,
        ];

        $metric_7 = new Metric();

        $metric_7->cvssV4_0 = provide_valid_cvss40()[0];
        $metric_7->scenarios = [
            provide_valid_metric_scenarios()[0],
        ];

        $metric_8 = new Metric();

        $metric_8->cvssV4_0 = provide_valid_cvss40()[0];
        $metric_8->scenarios = [
            null,
            ...provide_valid_metric_scenarios(),
        ];

        $metric_9 = new Metric();

        $metric_9->cvssV4_0 = provide_valid_cvss40()[0];
        $metric_9->format = '';

        return [
            $metric_0,
            $metric_1,
            $metric_2,
            $metric_3,
            $metric_4,
            $metric_5,
            $metric_6,
            $metric_7,
            $metric_8,
            $metric_9,
        ];
    }
}
