<?php

declare(strict_types=1);

namespace App\Console\Output\Style\Table\Common;

final readonly class TableFieldString
{
    public function __construct(
        private string $value,
        private int $limit,
    ) {
    }

    private function empty(): bool
    {
        return mb_strlen($this->value) <= 0;
    }

    /**
     * @return string[]
     */
    private function split(): array
    {
        $chunks = mb_split('\n', $this->value);

        if (false === $chunks) {
            return [
                $this->value,
            ];
        }

        return $chunks;
    }

    /**
     * @return string[]
     */
    private function mapRow(string $row): array
    {
        $size = mb_strlen($row);

        if ($size > $this->limit) {
            $strings = [];

            for ($j = 0; $j < $size; $j += $this->limit) {
                $strings[] = mb_trim(
                    mb_substr($row, $j, $this->limit),
                );
            }

            return $strings;
        }

        return [
            $row,
        ];
    }

    /**
     * @return string[]
     */
    public function toRows(): array
    {
        if ($this->empty()) {
            return [
                $this->value,
            ];
        }

        $chunks = $this->split();

        if (count($chunks) <= 0) {
            return [];
        }

        $emptyFilter = static function (string $row): bool {
            return mb_strlen($row) > 0;
        };

        $result = [];

        foreach (array_filter($chunks, $emptyFilter) as $string) {
            foreach ($this->mapRow($string) as $item) {
                $result[] = $item;
            }
        }

        return $result;
    }
}
