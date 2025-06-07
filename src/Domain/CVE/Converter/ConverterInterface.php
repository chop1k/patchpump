<?php

declare(strict_types=1);

namespace App\Domain\CVE\Converter;

use App\Domain\CVE\Record;

interface ConverterInterface
{
    public function convert(array $data): Record;
}
