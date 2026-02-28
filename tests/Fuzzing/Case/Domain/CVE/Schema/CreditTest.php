<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\Credit;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class CreditTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(Credit $credit): void
    {
        $errors = $this->validator()->validate($credit);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(Credit $credit): void
    {
        $errors = $this->validator()->validate($credit);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): Credit
    {
        return new Credit();
    }

    /**
     * @return iterable<non-negative-int, Credit>
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
            'user' => [
                '123e4567-e89b-12d3-a456-426614174000',
                '550e8400-e29b-41d4-a716-446655440000',
                null,
            ],
            'type' => [
                'finder',
                'reporter',
                'analyst',
                'coordinator',
                'remediation developer',
                'remediation reviewer',
                'remediation verifier',
                'tool',
                'sponsor',
                'other',
                null,
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
     * @return iterable<non-negative-int, Credit>
     */
    public static function failureProvider(): iterable
    {
        $configuration = [
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
            'user' => [
                '123e4567-e89b-12d3-a456-426614174000',
                '550e8400-e29b-41d4-a716-44665544',
                '550e8400e29b41d4a71644665544000000',
                '550e8400-e29b-41d4-a716-44-6655440000',
                'g50e8400-e29b-41d4-a716-446655440000',
                '550e8400 e29b 41d4 a716 446655440000',
            ],
            'type' => [
                null,
                '123',
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
