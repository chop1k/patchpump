<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\AffectedVersionChange;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

final class AffectedVersionChangeTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(AffectedVersionChange $change): void
    {
        $errors = $this->validator()->validate($change);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(AffectedVersionChange $change): void
    {
        $errors = $this->validator()->validate($change);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): AffectedVersionChange
    {
        return new AffectedVersionChange();
    }

    /**
     * @return iterable<non-negative-int, AffectedVersionChange>
     */
    public static function successProvider(): iterable
    {

        $configuration = [
            'at' => [
                '123',
            ],
            'status' => [
                'affected',
                'unaffected',
                'unknown',
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
     * @return iterable<non-negative-int, AffectedVersionChange>
     */
    public static function failureProvider(): iterable
    {
        $configuration = [
            'at' => [
                '123',
                str_repeat('A', 1025),
                '',
                null,
            ],
            'status' => [
                'affected',
                '123',
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