<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Cache;

use App\Infrastructure\Persistence\Contracts\RequestInterface;
use League\Flysystem\FilesystemException;
use LogicException;
use Override;

/**
 * @psalm-import-type CacheTemplateString from CacheTemplate
 * @psalm-import-type CacheValueString from CacheValue
 *
 * @implements RequestInterface<CacheTemplateString, CacheValueString>
 */
final readonly class CacheRequest implements RequestInterface
{
    public function __construct(
        private CacheTemplate $template,
        private CacheArguments $arguments,
    ) {
    }

    /**
     * @throws FilesystemException
     */
    #[Override]
    public function template(): string
    {
        $template = $this->template->value();
        $arguments = $this->arguments->arguments();

        $parameters = new CacheParameters($arguments)
            ->parameters();

        return strtr($template, $parameters);
    }

    #[Override]
    public function value(): string
    {
        return $this->arguments->arguments()['value'] ?? throw new LogicException('Value is required when using cache storage');
    }
}
