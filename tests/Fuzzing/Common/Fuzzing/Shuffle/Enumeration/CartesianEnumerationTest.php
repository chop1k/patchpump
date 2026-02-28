<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Enumeration;

use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Common\Values;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-api
 */
final class CartesianEnumerationTest extends TestCase
{
    /**
     * @param non-empty-array<non-negative-int, mixed>                                               $values
     * @param non-empty-array<non-negative-int, non-empty-array<non-negative-int, non-negative-int>> $expected
     */
    #[DataProvider('dataset')]
    public function testEnumeration(array $values, array $expected): void
    {
        $enumeration = new CartesianEnumeration(
            new Values(
                $values,
            )
        );

        $actual = iterator_to_array(
            $enumeration->generator(),
        );

        self::assertEquals($expected, $actual);
    }

    public static function dataset(): array
    {
        $values = [
            [
                [
                    'a', 'b',
                ],
                [
                    'b', 'a',
                ],
            ],
            [
                [
                    'a', 'b', 'c',
                ],
                [
                    'd', 'e', 'f',
                ],
            ],
            [
                [
                    'a', 'b',
                ],
                [
                    'c', 'd',
                ],
                [
                    'e', 'f',
                ],
            ],
        ];

        $expected = [
            [
                0, 0,
                0, 1,
                1, 0,
                1, 1,
            ],
            [
                0, 0,
                0, 1,
                0, 2,
                1, 0,
                1, 1,
                1, 2,
                2, 0,
                2, 1,
                2, 2,
            ],
            [
                0, 0, 0,
                0, 0, 1,
                0, 1, 0,
                0, 1, 1,
                1, 0, 0,
                1, 0, 1,
                1, 1, 0,
                1, 1, 1,
            ],
        ];

        return [
            [
                $values[0],
                $expected[0],
            ],
            [
                $values[1],
                $expected[1],
            ],
            [
                $values[2],
                $expected[2],
            ],
        ];
    }
}
