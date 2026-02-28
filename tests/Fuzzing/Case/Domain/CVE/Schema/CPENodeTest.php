<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\CPEMatch;
use App\Domain\CVE\Schema\CPENode;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class CPENodeTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(CPENode $node): void
    {
        $errors = $this->validator()->validate($node);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(CPENode $node): void
    {
        $errors = $this->validator()->validate($node);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): CPENode
    {
        return new CPENode();
    }

    /**
     * @return iterable<non-negative-int, CPENode>
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

        $configuration = [
            'operator' => [
                'AND',
                'OR',
            ],
            'negate' => [
                false,
                true,
                null,
            ],
            'cpeMatch' => [
                [
                    $match_1,
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
     * @return iterable<non-negative-int, CPENode>
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

        $match_2 = new CPEMatch();

        $match_2->vulnerable = null;
        $match_2->criteria = '123';
        $match_2->matchCriteriaId = null;
        $match_2->versionStartIncluding = null;
        $match_2->versionStartExcluding = null;
        $match_2->versionEndIncluding = null;
        $match_2->versionEndExcluding = null;

        $configuration = [
            'operator' => [
                'AND',
                '123',
                null,
            ],
            'negate' => [
                null,
            ],
            'cpeMatch' => [
                [
                    $match_1,
                ],
                [
                    $match_2,
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
