<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing;

use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Fuzzing\Factory\StructureFactory;
use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\CartesianShuffle;
use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\OFATShuffle;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @psalm-api
 */
final class FuzzingTest extends TestCase
{
    private static function factory(): stdClass
    {
        return new stdClass();
    }

    /**
     * @param non-empty-array<non-empty-string, non-empty-array<non-negative-int, mixed>>    $configuration
     * @param non-empty-array<non-negative-int, non-empty-array<non-negative-int, stdClass>> $expected
     */
    #[DataProvider('cartesianDataset')]
    public function testCartesianFuzzing(array $configuration, array $expected): void
    {
        $factory = self::factory(...);

        $configuration = new ArrayConfiguration(
            $configuration,
        );

        $fuzzing = new Fuzzing(
            new CartesianShuffle(
                $configuration,
            ),
            new StructureFactory(
                $factory,
                $configuration
            ),
        );

        $actual = iterator_to_array(
            $fuzzing->generator(),
        );

        self::assertEquals($expected, $actual);
    }

    public static function cartesianDataset(): array
    {
        $configurations = [
            [
                'test_1' => [
                    0,
                    1,
                ],
                'test_2' => [
                    2,
                    3,
                ],
            ],
        ];

        $expected = [
            [
                (object) [
                    'test_1' => 0,
                    'test_2' => 2,
                ],
                (object) [
                    'test_1' => 0,
                    'test_2' => 3,
                ],
                (object) [
                    'test_1' => 1,
                    'test_2' => 2,
                ],
                (object) [
                    'test_1' => 1,
                    'test_2' => 3,
                ],
            ],
        ];

        return [
            [
                $configurations[0],
                $expected[0],
            ],
        ];
    }

    /**
     * @param non-empty-array<non-empty-string, non-empty-array<non-negative-int, mixed>>    $configuration
     * @param non-empty-array<non-negative-int, non-empty-array<non-negative-int, stdClass>> $expected
     */
    #[DataProvider('ofatDataset')]
    public function testOFATFuzzing(array $configuration, array $expected): void
    {
        $factory = self::factory(...);

        $configuration = new ArrayConfiguration(
            $configuration,
        );

        $fuzzing = new Fuzzing(
            new OFATShuffle(
                $configuration,
            ),
            new StructureFactory(
                $factory,
                $configuration
            ),
        );

        $actual = iterator_to_array(
            $fuzzing->generator(),
        );

        self::assertEquals($expected, $actual);
    }

    public static function ofatDataset(): array
    {
        $configurations = [
            [
                'test_1' => [
                    0,
                    1,
                ],
                'test_2' => [
                    2,
                    3,
                ],
            ],
        ];

        $expected = [
            [
                (object) [
                    'test_1' => 1,
                    'test_2' => 2,
                ],
                (object) [
                    'test_1' => 0,
                    'test_2' => 3,
                ],
            ],
        ];

        return [
            [
                $configurations[0],
                $expected[0],
            ],
        ];
    }
}
