<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\Metric;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class MetricTest extends AbstractSchemaTestCase
{
//    #[DataProvider('successProvider')]
//    public function testValidationShouldBeSuccessful(Metric $metric): void
//    {
//        $errors = $this->validator()->validate($metric);
//
//        $this->assertValidationPassed($errors);
//    }
//
//    #[DataProvider('failureProvider')]
//    public function testValidationShouldBeFailed(Metric $metric): void
//    {
//        $errors = $this->validator()->validate($metric);
//
//        $this->assertValidationFailed($errors);
//    }
//
//    private static function factory(): Metric
//    {
//        return new Metric();
//    }
//
//    /**
//     * @return iterable<non-negative-int, Metric>
//     */
//    public static function successProvider(): iterable
//    {
//        $configuration = [
//            'format' => [
//                '123',
//                null,
//            ],
//            'scenarios' => [
//            ],
//            'cvssV4_0' => [
//
//            ],
//            'cvssV3_1' => [
//
//            ],
//            'cvssV3_0' => [
//
//            ],
//            'cvssV2_0' => [
//
//            ],
//            'other' => [
//            ]
//        ];
//
//        $factory = self::factory(...);
//
//        $configuration = new ArrayConfiguration(
//            $configuration,
//        );
//
//        return new ProviderFactory($factory, $configuration)
//            ->cartesianProvider();
//    }
//
//    /**
//     * @return iterable<non-negative-int, Metric>
//     */
//    public static function failureProvider(): iterable
//    {
//        $configuration = [
//            'format' => [
//                '123',
//                str_repeat('A', 65),
//                '',
//            ],
//            'scenarios' => [
//            ],
//            'cvssV4_0' => [
//                null,
//            ],
//            'cvssV3_1' => [
//                null,
//            ],
//            'cvssV3_0' => [
//                null,
//            ],
//            'cvssV2_0' => [
//                null,
//            ],
//            'other' => [
//            ]
//        ];
//
//        $factory = self::factory(...);
//
//        $configuration = new ArrayConfiguration(
//            $configuration,
//        );
//
//        return new ProviderFactory($factory, $configuration)
//            ->ofatProvider();
//    }
}