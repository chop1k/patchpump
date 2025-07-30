<?php

declare(strict_types=1);

namespace App\Console\Output\Style\Table\Common;

trait TableStyle
{
    /**
     * @param string $key
     * @param string|null $value
     *
     * @return array{
     *     0: string,
     *     1: string,
     * }[]
     */
    protected function keyValue(string $key, ?string $value): array
    {
        if ($value === null) {
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
     * @param string $key
     * @param int $index
     * @param string|null $value
     *
     * @return array{
     *     0: string,
     *     1: string,
     *     2: string,
     * }[]
     */
    protected function keyIndexValue(string $key, int $index, ?string $value): array
    {
        if ($value === null) {
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