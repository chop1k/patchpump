<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Common;

use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Contracts\EnumerationInterface;
use Generator;
use Override;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-api
 */
final class ArgumentsAssemblyTest extends TestCase
{
    /**
     * @param non-negative-int                                                                       $limit
     * @param non-empty-array<non-negative-int, non-empty-array<non-negative-int, non-negative-int>> $expected
     */
    #[DataProvider('dataset')]
    public function testAssembly(int $limit, EnumerationInterface $enumeration, array $expected): void
    {
        $assembly = new ArgumentsAssembly(
            $limit,
            $enumeration
        );

        $actual = iterator_to_array(
            $assembly->generator(),
        );

        self::assertEquals($expected, $actual);
    }

    public static function dataset(): array
    {
        $limits = [
            2,
            10,
        ];

        $enumerations = [
            new class implements EnumerationInterface {
                /**
                 * @return Generator<non-negative-int, non-negative-int>
                 */
                #[Override]
                public function generator(): Generator
                {
                    yield 1;
                    yield 0;
                }
            },
            new class implements EnumerationInterface {
                /**
                 * @return Generator<non-negative-int, non-negative-int>
                 */
                #[Override]
                public function generator(): Generator
                {
                    yield 0;
                    yield 1;
                    yield 2;
                    yield 3;
                    yield 4;
                    yield 5;
                    yield 6;
                    yield 7;
                    yield 8;
                    yield 9;
                }
            },
        ];

        $expected = [
            [
                [
                    1,
                    0,
                ],
            ],
            [
                [
                    0,
                    1,
                    2,
                    3,
                    4,
                    5,
                    6,
                    7,
                    8,
                    9,
                ],
            ],
        ];

        return [
            [
                $limits[0],
                $enumerations[0],
                $expected[0],
            ],
            [
                $limits[1],
                $enumerations[1],
                $expected[1],
            ],
        ];
    }
}
