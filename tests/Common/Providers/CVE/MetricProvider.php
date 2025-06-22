<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\CVE;

use App\Domain\CVE\Schema\Metric;

final class MetricProvider
{
    public static function provideValid(): array
    {
        $metric_0 = new Metric();

        $metric_0->cvssV2_0 = CVSS20Provider::provideValid()[0];

        $metric_1 = new Metric();

        $metric_1->format = '123';
        $metric_1->cvssV2_0 = CVSS20Provider::provideValid()[0];

        $metric_2 = new Metric();

        $metric_2->cvssV3_0 = CVSS30Provider::provideValid()[0];

        $metric_3 = new Metric();

        $metric_3->cvssV3_1 = CVSS31Provider::provideValid()[0];

        $metric_4 = new Metric();

        $metric_4->cvssV4_0 = CVSS40Provider::provideValid()[0];

        $metric_5 = new Metric();

        $metric_5->scenarios = MetricScenarioProvider::provideValid();
        $metric_5->cvssV4_0 = CVSS40Provider::provideValid()[0];

        return [
            $metric_0,
            $metric_1,
            $metric_2,
            $metric_3,
            $metric_4,
            $metric_5,
        ];
    }

    public static function provideInvalid(): array
    {
        $metric_0 = new Metric();

        $metric_0->cvssV2_0 = CVSS20Provider::provideInvalid()[0];

        $metric_1 = new Metric();

        $metric_1->cvssV3_0 = CVSS30Provider::provideInvalid()[0];

        $metric_2 = new Metric();

        $metric_2->cvssV3_1 = CVSS31Provider::provideInvalid()[0];

        $metric_3 = new Metric();

        $metric_3->cvssV4_0 = CVSS40Provider::provideInvalid()[0];

        $metric_4 = new Metric();

        $metric_4->cvssV4_0 = CVSS40Provider::provideValid()[0];
        $metric_4->scenarios = [];

        $metric_5 = new Metric();

        $metric_5->cvssV4_0 = CVSS40Provider::provideValid()[0];
        $metric_5->scenarios = [
            null,
        ];

        $metric_6 = new Metric();

        $metric_6->cvssV4_0 = CVSS40Provider::provideValid()[0];
        $metric_6->scenarios = [
            true,
        ];

        $metric_7 = new Metric();

        $metric_7->cvssV4_0 = CVSS40Provider::provideValid()[0];
        $metric_7->scenarios = [
            CVSS40Provider::provideValid()[0]
        ];

        $metric_8 = new Metric();

        $metric_8->cvssV4_0 = CVSS40Provider::provideValid()[0];
        $metric_8->scenarios = [
            null,
            ...MetricScenarioProvider::provideValid(),
        ];

        $metric_9 = new Metric();

        $metric_9->cvssV4_0 = CVSS40Provider::provideValid()[0];
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