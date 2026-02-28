<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Common;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-api
 */
final class ArgumentsFactoryTest extends TestCase
{
    /**
     * @param non-empty-array<non-negative-int, mixed>            $values
     * @param non-empty-array<non-negative-int, non-negative-int> $arguments
     * @param non-empty-array<non-negative-int, mixed>            $expected
     */
    #[DataProvider('dataset')]
    public function testFactory(array $values, array $arguments, array $expected): void
    {
        $factory = new ArgumentsFactory(
            $values,
        );

        $actual = $factory->arguments(
            $arguments,
        );

        self::assertEquals($expected, $actual);
    }

    public static function dataset(): array
    {
        $values = [
            [
                [
                    'test_1',
                    'test_2',
                ],
                [
                    'test_1',
                    'test_2',
                ],
            ],
        ];

        $arguments = [
            [
                0,
                0,
            ],
            [
                0,
                1,
            ],
        ];

        $expected = [
            [
                'test_1',
                'test_1',
            ],
            [
                'test_1',
                'test_2',
            ],
        ];

        return [
            [
                $values[0],
                $arguments[0],
                $expected[0],
            ],
            [
                $values[0],
                $arguments[1],
                $expected[1],
            ],
        ];
    }
}
