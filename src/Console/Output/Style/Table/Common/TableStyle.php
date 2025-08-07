<?php

declare(strict_types=1);

namespace App\Console\Output\Style\Table\Common;

trait TableStyle
{
    /**
     * @return array{
     *     0: string,
     *     1: string,
     * }[]
     */
    protected function keyValue(string $key, ?string $value): array
    {
        if (null === $value) {
            return [];
        }

        return [
            [
                $key,
                $value,
            ],
        ];
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     *     2: string,
     * }[]
     */
    protected function keyIndexValue(string $key, int $index, ?string $value): array
    {
        if (null === $value) {
            return [];
        }

        return [
            [
                $key,
                $index,
                $value,
            ],
        ];
    }
}
