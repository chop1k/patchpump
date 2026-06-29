<?php

declare(strict_types=1);

use Testo\Application\Config\ApplicationConfig;
use Testo\Application\Config\SuiteConfig;

return new ApplicationConfig(
    suites: [
        new SuiteConfig(
            name: 'e2e',
            location: ['tests/E2E'],
        ),
        new SuiteConfig(
            name: 'fuzzing',
            location: ['tests/Fuzzing'],
        ),
        new SuiteConfig(
            name: 'unit',
            location: ['tests/Unit'],
        ),
    ],
);
