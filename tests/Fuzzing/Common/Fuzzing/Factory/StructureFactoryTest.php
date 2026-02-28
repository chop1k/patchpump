<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Factory;

use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @psalm-api
 */
final class StructureFactoryTest extends TestCase
{
    private static function factory(): stdClass
    {
        return new stdClass();
    }

    /**
     * @param non-empty-array<non-empty-string, non-empty-array<non-negative-int, mixed>> $configuration
     * @param non-empty-array<non-negative-int, mixed>                                    $arguments
     */
    #[DataProvider('dataset')]
    public function testObjectCreation(array $configuration, array $arguments, stdClass $expected): void
    {
        $factory = self::factory(...);

        $configuration = new ArrayConfiguration(
            $configuration,
        );

        $factory = new StructureFactory(
            $factory,
            $configuration,
        );

        $actual = $factory->objectFor(...$arguments);

        self::assertEquals($expected, $actual);
    }

    public static function dataset(): array
    {
        $configurations = [
            [
                'test_1' => [
                    'a',
                    'b',
                ],
                'test_2' => [
                    'c',
                    'd',
                ],
            ],
        ];

        $arguments = [
            [
                'a',
                'c',
            ],
            [
                'b',
                'c',
            ],
            [
                'a',
                'd',
            ],
            [
                'b',
                'd',
            ],
        ];

        $expected = [
            [
                'test_1' => 'a',
                'test_2' => 'c',
            ],
            [
                'test_1' => 'b',
                'test_2' => 'c',
            ],
            [
                'test_1' => 'a',
                'test_2' => 'd',
            ],
            [
                'test_1' => 'b',
                'test_2' => 'd',
            ],
        ];

        return [
            [
                $configurations[0],
                $arguments[0],
                (object) $expected[0],
            ],
            [
                $configurations[0],
                $arguments[1],
                (object) $expected[1],
            ],
            [
                $configurations[0],
                $arguments[2],
                (object) $expected[2],
            ],
            [
                $configurations[0],
                $arguments[3],
                (object) $expected[3],
            ],
        ];
    }
}
