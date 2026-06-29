<?php

declare(strict_types=1);

namespace App\Domain\Monitoring\Artifact;

final readonly class NmapArtifact
{
    public function __construct(
        public mixed $file,
    ) {
    }

    public function nodes(): mixed
    {
    }
}
