<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Shuffle;

use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-api
 */
final class OFATShuffleTest extends TestCase
{
    /**
     * @param non-empty-array<non-negative-int, non-empty-array<non-negative-int, mixed>> $values
     * @param non-empty-array<non-negative-int, non-empty-array<non-negative-int, mixed>> $expected
     */
    #[DataProvider('dataset')]
    public function testShuffling(array $values, array $expected): void
    {
        $enumeration = new OFATShuffle(
            new ArrayConfiguration(
                $values,
            ),
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
                    'c', 'd',
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
                ['b', 'c'],
                ['a', 'd'],
            ],
            [
                ['b', 'd'],
                ['c', 'd'],
                ['a', 'e'],
                ['a', 'f'],
            ],
            [
                ['b', 'c', 'e'],
                ['a', 'd', 'e'],
                ['a', 'c', 'f'],
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
        ];
    }
}
