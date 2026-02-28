<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\CPEApplicability;
use App\Domain\CVE\Schema\CPEMatch;
use App\Domain\CVE\Schema\CPENode;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class CPEApplicabilityTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(CPEApplicability $applicability): void
    {
        $errors = $this->validator()->validate($applicability);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(CPEApplicability $applicability): void
    {
        $errors = $this->validator()->validate($applicability);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): CPEApplicability
    {
        return new CPEApplicability();
    }

    /**
     * @return iterable<non-negative-int, CPEApplicability>
     */
    public static function successProvider(): iterable
    {
        $match_1 = new CPEMatch();

        $match_1->vulnerable = false;
        $match_1->criteria = '123';
        $match_1->matchCriteriaId = null;
        $match_1->versionStartIncluding = null;
        $match_1->versionStartExcluding = null;
        $match_1->versionEndIncluding = null;
        $match_1->versionEndExcluding = null;

        $node_1 = new CPENode();

        $node_1->operator = 'AND';
        $node_1->cpeMatch = [
            $match_1,
        ];

        $configuration = [
            'operator' => [
                'AND',
                'OR',
                null,
            ],
            'negate' => [
                false,
                true,
                null,
            ],
            'nodes' => [
                [
                    $node_1,
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
     * @return iterable<non-negative-int, CPEApplicability>
     */
    public static function failureProvider(): iterable
    {
        $match_1 = new CPEMatch();

        $match_1->vulnerable = false;
        $match_1->criteria = '123';
        $match_1->matchCriteriaId = null;
        $match_1->versionStartIncluding = null;
        $match_1->versionStartExcluding = null;
        $match_1->versionEndIncluding = null;
        $match_1->versionEndExcluding = null;

        $node_1 = new CPENode();

        $node_1->operator = 'AND';
        $node_1->cpeMatch = [
            $match_1,
        ];

        $node_2 = new CPENode();

        $node_2->operator = '123';
        $node_2->cpeMatch = [
            $match_1,
        ];

        $configuration = [
            'operator' => [
                'AND',
                '123',
            ],
            'negate' => [
                null,
            ],
            'nodes' => [
                [
                    $node_1,
                ],
                [
                    $node_2,
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
