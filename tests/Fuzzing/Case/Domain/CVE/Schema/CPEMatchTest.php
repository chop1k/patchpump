<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\CPEMatch;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class CPEMatchTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(CPEMatch $match): void
    {
        $errors = $this->validator()->validate($match);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(CPEMatch $match): void
    {
        $errors = $this->validator()->validate($match);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): CPEMatch
    {
        return new CPEMatch();
    }

    /**
     * @return iterable<non-negative-int, CPEMatch>
     */
    public static function successProvider(): iterable
    {
        $configuration = [
            'vulnerable' => [
                true,
                false,
            ],
            'criteria' => [
                '123',
            ],
            'matchCriteriaId' => [
                '123e4567-e89b-12d3-a456-426614174000',
                '550e8400-e29b-41d4-a716-446655440000',
                null,
            ],
            'versionStartExcluding' => [
                '123',
                null,
            ],
            'versionStartIncluding' => [
                '123',
                null,
            ],
            'versionEndExcluding' => [
                '123',
                null,
            ],
            'versionEndIncluding' => [
                '123',
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
     * @return iterable<non-negative-int, CPEMatch>
     */
    public static function failureProvider(): iterable
    {
        $configuration = [
            'vulnerable' => [
                true,
                null,
            ],
            'criteria' => [
                '123',
                str_repeat('A', 4097),
                '',
                null,
            ],
            'matchCriteriaId' => [
                '123e4567-e89b-12d3-a456-426614174000',
                '550e8400-e29b-41d4-a716-44665544',
                '550e8400e29b41d4a71644665544000000',
                '550e8400-e29b-41d4-a716-44-6655440000',
                'g50e8400-e29b-41d4-a716-446655440000',
                '550e8400 e29b 41d4 a716 446655440000',
            ],
            'versionStartExcluding' => [
                null,
                str_repeat('A', 1025),
                '',
            ],
            'versionStartIncluding' => [
                null,
                str_repeat('A', 1025),
                '',
            ],
            'versionEndExcluding' => [
                null,
                str_repeat('A', 1025),
                '',
            ],
            'versionEndIncluding' => [
                null,
                str_repeat('A', 1025),
                '',
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
