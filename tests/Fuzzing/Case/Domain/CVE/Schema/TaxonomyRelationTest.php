<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\TaxonomyRelation;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

final class TaxonomyRelationTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(TaxonomyRelation $relation): void
    {
        $errors = $this->validator()->validate($relation);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(TaxonomyRelation $relation): void
    {
        $errors = $this->validator()->validate($relation);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): TaxonomyRelation
    {
        return new TaxonomyRelation();
    }

    /**
     * @return iterable<non-negative-int, TaxonomyRelation>
     */
    public static function successProvider(): iterable
    {

        $configuration = [
            'taxonomyId' => [
                '123',
            ],
            'relationshipName' => [
                '123'
            ],
            'relationshipValue' => [
                '123'
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
     * @return iterable<non-negative-int, TaxonomyRelation>
     */
    public static function failureProvider(): iterable
    {
        $configuration = [
            'taxonomyId' => [
                '123',
                str_repeat('A', 2049),
                '',
                null,
            ],
            'relationshipName' => [
                '123',
                str_repeat('A', 129),
                '',
                null,
            ],
            'relationshipValue' => [
                '123',
                str_repeat('A', 2049),
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