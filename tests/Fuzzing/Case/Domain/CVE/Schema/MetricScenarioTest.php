<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\MetricScenario;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class MetricScenarioTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(MetricScenario $scenario): void
    {
        $errors = $this->validator()->validate($scenario);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(MetricScenario $scenario): void
    {
        $errors = $this->validator()->validate($scenario);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): MetricScenario
    {
        return new MetricScenario();
    }

    /**
     * @return iterable<non-negative-int, MetricScenario>
     */
    public static function successProvider(): iterable
    {
        $configuration = [
            'lang' => [
                'ru',
                'en',
            ],
            'value' => [
                '123',
            ],
        ];

        $factory = self::factory(...);

        $configuration = new ArrayConfiguration(
            $configuration,
        );

        return new ProviderFactory($factory, $configuration)
            ->cartesianProvider();
    }

    /**
     * @return iterable<non-negative-int, MetricScenario>
     */
    public static function failureProvider(): iterable
    {
        $configuration = [
            'lang' => [
                'ru',
                'us',
                '123',
                null,
            ],
            'value' => [
                '123',
                str_repeat('A', 4097),
                '',
                null,
            ],
        ];

        $factory = self::factory(...);

        $configuration = new ArrayConfiguration(
            $configuration,
        );

        return new ProviderFactory($factory, $configuration)
            ->ofatProvider();
    }
}
