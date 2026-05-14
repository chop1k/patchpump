<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL;

use App\Infrastructure\Persistence\SQL\Contracts\SQLPersistenceInterface;
use League\Flysystem\FilesystemOperator;
use Override;

/**
 * @implements PersistenceInterface<SQLName, SQLResponse>
 */
final readonly class SQLPersistence implements SQLPersistenceInterface
{
    public function __construct(
        private FilesystemOperator $filesystem,
        private SQLBridgeInterface $bridge,
    ) {
    }

    public function template(SQLName $name): SQLTemplate
    {
        return new SQLTemplate(
            $this->filesystem,
            $name
        );
    }

    public function request(SQLTemplate $template, SQLArguments $arguments): SQLRequest
    {
        return new SQLRequest(
            $template,
            $arguments,
        );
    }

    #[Override]
    public function response(SQLName $name, SQLArguments $arguments): SQLResponse
    {
        $template = $this->template($name);

        $request = $this->request($template, $arguments);

        return $this->bridge->response($request);
    }
}
