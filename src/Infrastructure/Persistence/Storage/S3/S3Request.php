<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\S3;

use App\Infrastructure\Persistence\Contracts\RequestInterface;
use League\Flysystem\FilesystemException;
use LogicException;
use Override;
use Psr\Http\Message\StreamInterface;

/**
 * @psalm-import-type S3TemplateType from S3PsalmTypes as TemplateType
 * @psalm-import-type S3Value from S3PsalmTypes as ValueType
 *
 * @implements RequestInterface<TemplateType, ValueType>
 */
final readonly class S3Request implements RequestInterface
{
    public function __construct(
        private S3Template $template,
        private S3Arguments $arguments,
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

        $parameters = new S3Parameters($arguments)
            ->parameters();

        return strtr($template, $parameters);
    }

    #[Override]
    public function value(): StreamInterface
    {
        return $this->arguments->arguments()['stream'] ?? throw new LogicException('Stream argument is required for S3 storage');
    }
}
