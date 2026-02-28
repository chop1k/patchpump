<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\Other;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class OtherMetricTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(Other $other): void
    {
        $errors = $this->validator()->validate($other);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(Other $other): void
    {
        $errors = $this->validator()->validate($other);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): Other
    {
        return new Other();
    }

    /**
     * @return iterable<non-negative-int, Other>
     */
    public static function successProvider(): iterable
    {
        $configuration = [
            'type' => [
                'plain/text',
                '123',
            ],
            'content' => [
                [
                    '213',
                ],
                [
                    true,
                ],
                [
                    false,
                ],
                [
                    '123',
                ],
                [
                    'a' => 'b',
                ],
                [
                    'a' => [
                        null,
                    ],
                ],
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
     * @return iterable<non-negative-int, Other>
     */
    public static function failureProvider(): iterable
    {
        $configuration = [
            'type' => [
                '123',
                str_repeat('A', 129),
                '',
                null,
            ],
            'content' => [
                [
                    '123',
                ],
                [],
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
