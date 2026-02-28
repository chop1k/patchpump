<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\ProblemDescription;
use App\Domain\CVE\Schema\Reference;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

final class ProblemDescriptionTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(ProblemDescription $description): void
    {
        $errors = $this->validator()->validate($description);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(ProblemDescription $description): void
    {
        $errors = $this->validator()->validate($description);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): ProblemDescription
    {
        return new ProblemDescription();
    }

    /**
     * @return iterable<non-negative-int, ProblemDescription>
     */
    public static function successProvider(): iterable
    {
        $reference_1 = new Reference();

        $reference_1->url = '123';
        $reference_1->name = null;
        $reference_1->tags = null;

        $configuration = [
            'lang' => [
                'ru',
                'en',
            ],
            'description' => [
                '123',
            ],
            'cweId' => [
                null,
                '12345',
            ],
            'type' => [
                '123',
                null,
            ],
            'references' => [
                null,
                [
                    $reference_1,
                ]
            ]
        ];

        $factory = self::factory(...);

        $configuration = new ArrayConfiguration(
            $configuration,
        );

        return new ProviderFactory($factory, $configuration)
            ->cartesianProvider();
    }

    /**
     * @return iterable<non-negative-int, ProblemDescription>
     */
    public static function failureProvider(): iterable
    {
        $reference_1 = new Reference();

        $reference_1->url = null;
        $reference_1->name = null;

        $reference_2 = new Reference();

        $reference_2->url = '123';
        $reference_2->name = null;

        $configuration = [
            'lang' => [
                'ru',
                '123',
                null,
            ],
            'description' => [
                '123',
                str_repeat('A', 4097),
                '',
                null,
            ],
            'cweId' => [
                null,
                str_repeat('A', 10),
                '',
                '123',
            ],
            'type' => [
                '123',
            ],
            'references' => [
                null,
                [
                    $reference_1,
                ],
                [
                    $reference_2,
                    $reference_2,
                ],
                [
                    null,
                ]
            ]
        ];

        $factory = self::factory(...);

        $configuration = new ArrayConfiguration(
            $configuration,
        );

        return new ProviderFactory($factory, $configuration)
            ->ofatProvider();
    }
}