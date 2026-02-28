<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\Description;
use App\Domain\CVE\Schema\Impact;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class ImpactTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(Impact $impact): void
    {
        $errors = $this->validator()->validate($impact);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(Impact $impact): void
    {
        $errors = $this->validator()->validate($impact);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): Impact
    {
        return new Impact();
    }

    /**
     * @return iterable<non-negative-int, Impact>
     */
    public static function successProvider(): iterable
    {
        $description_1 = new Description();

        $description_1->lang = 'ru';
        $description_1->value = '123';
        $description_1->supportingMedia = null;

        $configuration = [
            'capecId' => [
                'CAPEC-123',
                'CAPEC-9999',
                'CAPEC-1000',
                null,
            ],
            'descriptions' => [
                [
                    $description_1,
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
     * @return iterable<non-negative-int, Impact>
     */
    public static function failureProvider(): iterable
    {
        $description_1 = new Description();

        $description_1->lang = 'ru';
        $description_1->value = '123';
        $description_1->supportingMedia = null;

        $description_2 = new Description();

        $description_2->lang = null;
        $description_2->value = '123';
        $description_2->supportingMedia = null;

        $configuration = [
            'capecId' => [
                'CAPEC-123',
                'CAPEC-00000',
            ],
            'descriptions' => [
                [
                    $description_1,
                ],
                [
                    $description_2,
                ],
                [
                    null,
                ],
                [
                    $description_1,
                    $description_1,
                ],
                [],
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
