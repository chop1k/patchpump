<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\TaxonomyMapping;
use App\Domain\CVE\Schema\TaxonomyRelation;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class TaxonomyMappingTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(TaxonomyMapping $mapping): void
    {
        $errors = $this->validator()->validate($mapping);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(TaxonomyMapping $mapping): void
    {
        $errors = $this->validator()->validate($mapping);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): TaxonomyMapping
    {
        return new TaxonomyMapping();
    }

    /**
     * @return iterable<non-negative-int, TaxonomyMapping>
     */
    public static function successProvider(): iterable
    {
        $relation_1 = new TaxonomyRelation();

        $relation_1->taxonomyId = '123';
        $relation_1->relationshipName = '123';
        $relation_1->relationshipValue = '123';

        $configuration = [
            'taxonomyName' => [
                '123',
            ],
            'taxonomyVersion' => [
                null,
                '123',
            ],
            'taxonomyRelations' => [
                [
                    $relation_1,
                ]
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
     * @return iterable<non-negative-int, TaxonomyMapping>
     */
    public static function failureProvider(): iterable
    {
        $relation_1 = new TaxonomyRelation();

        $relation_1->taxonomyId = '123';
        $relation_1->relationshipName = '123';
        $relation_1->relationshipValue = '123';

        $relation_2 = new TaxonomyRelation();

        $relation_2->taxonomyId = null;
        $relation_2->relationshipName = '123';
        $relation_2->relationshipValue = '123';

        $configuration = [
            'taxonomyName' => [
                '123',
                str_repeat('A', 129),
                '',
                null,
            ],
            'taxonomyVersion' => [
                null,
                str_repeat('A', 129),
                '',
            ],
            'taxonomyRelations' => [
                [
                    $relation_1,
                ],
                [
                    $relation_1,
                    $relation_1,
                ],
                [
                    $relation_2,
                ],
                [
                    null,
                ],
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