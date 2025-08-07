<?php

declare(strict_types=1);

namespace App\Console\Output\Style\Table\Common;

final readonly class TableField
{
    public function __construct(
        private string $field,
        /**
         * @var array{
         *     0: int,
         *     1: string[],
         * } $rows
         */
        private array $rows = [],
    ) {
    }

    public function addLine(int $index, string $value): self
    {
        $row = $this->rows[$index] ?? null;

        $result = $this->rows;

        if (null === $row) {
            $result[$index] = [$value];
        } else {
            $result[$index] = array_merge($row, [$value]);
        }

        return new self(
            $this->field,
            $result,
        );
    }

    private function fieldGenerator(int $index, array $values): \Generator
    {
        $fieldUsed = 0 !== $index;
        $indexUsed = false;

        foreach ($values as $string) {
            $fieldString = new TableFieldString($string, 100, 4);

            foreach ($fieldString->toRows() as $row) {
                yield [
                    false === $fieldUsed ? $this->field : '',
                    false === $indexUsed ? $index : '',
                    $row,
                ];

                if (false === $fieldUsed) {
                    $fieldUsed = true;
                }

                if (false === $indexUsed) {
                    $indexUsed = true;
                }
            }
        }
    }

    public function toArray(): array
    {
        $result = [];

        foreach ($this->rows as $i => $row) {
            foreach ($this->fieldGenerator($i, $row) as $rows) {
                $result[] = $rows;
            }
        }

        return $result;
    }
}
