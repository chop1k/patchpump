<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\S3;

use App\Infrastructure\Persistence\Contracts\PersistenceInterface;
use App\Infrastructure\Persistence\Contracts\Request\ArgumentsInterface;
use App\Infrastructure\Persistence\Contracts\Request\NameInterface;
use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use Override;

/**
 * @implements PersistenceInterface<S3Name, S3Arguments, S3Response>
 */
final readonly class S3Persistence implements PersistenceInterface
{
    private function template(S3Name $name): S3Template
    {
        return new S3Template($name);
    }

    private function request(S3Template $template, S3Arguments $arguments): S3Request
    {
    }

    #[Override]
    public function response(NameInterface $name, ArgumentsInterface $arguments): ResponseInterface
    {
    }
}
