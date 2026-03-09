<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Cache;

use App\Infrastructure\Persistence\Contracts\PersistenceInterface;
use App\Infrastructure\Persistence\Contracts\Request\ArgumentsInterface;
use App\Infrastructure\Persistence\Contracts\Request\NameInterface;
use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use League\Flysystem\FilesystemOperator;
use Override;

/**
 * @implements PersistenceInterface<CacheName, CacheArguments, CacheResponse>
 */
final readonly class CachePersistence implements PersistenceInterface
{
    public function __construct(
        private FilesystemOperator $filesystem,
        private CacheBridge $bridge,
    ) {
    }

    private function template(NameInterface $name): CacheTemplate
    {
        return new CacheTemplate($this->filesystem, $name);
    }

    private function request(CacheTemplate $template, CacheArguments $arguments): CacheRequest
    {
        return new CacheRequest($template, $arguments);
    }

    #[Override]
    public function response(NameInterface $name, ArgumentsInterface $arguments): ResponseInterface
    {
        $template = $this->template($name);

        $request = $this->request($template, $arguments);

        return $this->bridge->response($request);
    }
}
