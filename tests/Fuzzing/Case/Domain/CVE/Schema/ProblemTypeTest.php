<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\ProblemDescription;
use App\Domain\CVE\Schema\ProblemType;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;
use stdClass;

final class ProblemTypeTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(ProblemType $type): void
    {
        $errors = $this->validator()->validate($type);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(ProblemType $type): void
    {
        $errors = $this->validator()->validate($type);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): ProblemType
    {
        return new ProblemType();
    }

    /**
     * @return iterable<non-negative-int, ProblemType>
     */
    public static function successProvider(): iterable
    {
        $description_1 = new ProblemDescription();

        $description_1->lang = 'ru';
        $description_1->description = '123';

        $configuration = [
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
     * @return iterable<non-negative-int, ProblemType>
     */
    public static function failureProvider(): iterable
    {
        $description_1 = new ProblemDescription();

        $description_1->lang = 'ru';
        $description_1->description = '123';

        $description_2 = new ProblemDescription();

        $description_2->lang = 'ru';
        $description_2->description = null;

        $configuration = [
            'descriptions' => [
                [
                    $description_1,
                ],
                [
                    $description_2,
                ],
                [
                    $description_1,
                    $description_2,
                ],
                [],
                [
                    null,
                ],
                [
                    $description_1,
                    $description_1,
                ],
                [
                    new stdClass(),
                ]
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