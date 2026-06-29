<?php

declare(strict_types=1);

namespace App\Infrastructure\Transformation\Artifacts\Vulnerabilities;

final readonly class VulsJsonReport
{
    public function __construct(
        private string $content,
    ) {
    }
}
