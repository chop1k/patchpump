<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\MetricScenario;

if (false === function_exists('provide_valid_metric_scenarios')) {
    /**
     * @return MetricScenario[]
     */
    function provide_valid_metric_scenarios(): array
    {
        $scenario_0 = new MetricScenario();

        $scenario_0->lang = 'en';
        $scenario_0->value = '123';

        return [
            $scenario_0,
        ];
    }
}

if (false === function_exists('provide_invalid_metric_scenarios')) {
    /**
     * @return MetricScenario[]
     */
    function provide_invalid_metric_scenarios(): array
    {
        $scenario_0 = new MetricScenario();

        $scenario_0->lang = null;
        $scenario_0->value = null;

        $scenario_1 = new MetricScenario();

        $scenario_1->lang = 'en';
        $scenario_1->value = null;

        $scenario_2 = new MetricScenario();

        $scenario_2->lang = 'en';
        $scenario_2->value = '';

        return [
            $scenario_0,
            $scenario_1,
            $scenario_2,
        ];
    }
}
