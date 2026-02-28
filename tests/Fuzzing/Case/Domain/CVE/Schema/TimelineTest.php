<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\Timeline;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class TimelineTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(Timeline $timeline): void
    {
        $errors = $this->validator()->validate($timeline);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(Timeline $timeline): void
    {
        $errors = $this->validator()->validate($timeline);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): Timeline
    {
        return new Timeline();
    }

    /**
     * @return iterable<non-negative-int, Timeline>
     */
    public static function successProvider(): iterable
    {
        $configuration = [
            'time' => [
                '2025-09-28T08:37:24.957Z',
                '2025-09-28T08:39:03',
            ],
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
     * @return iterable<non-negative-int, Timeline>
     */
    public static function failureProvider(): iterable
    {
        $configuration = [
            'time' => [
                '2025-09-28T08:37:24.957Z',
                null,
            ],
            'lang' => [
                'ru',
                'us',
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
