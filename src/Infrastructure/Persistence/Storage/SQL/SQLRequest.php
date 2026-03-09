<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL;

use App\Infrastructure\Persistence\Contracts\RequestInterface;
use League\Flysystem\FilesystemException;
use Override;

/**
 * @psalm-import-type SQLTemplateType from SQLPsalmTypes as TemplateType
 * @psalm-import-type SQLValueType from SQLPsalmTypes as ValueType
 *
 * @implements RequestInterface<TemplateType, ValueType>
 */
final readonly class SQLRequest implements RequestInterface
{
    public function __construct(
        private SQLTemplate $template,
        private SQLArguments $arguments,
    ) {
    }

    /**
     * @throws FilesystemException
     */
    #[Override]
    public function template(): string
    {
        return $this->template->value();
    }

    #[Override]
    public function value(): array
    {
        return $this->arguments->arguments();
    }
}
