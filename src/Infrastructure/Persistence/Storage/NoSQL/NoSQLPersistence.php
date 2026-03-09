<?php

namespace App\Infrastructure\Persistence\Storage\NoSQL;

use App\Infrastructure\Persistence\Contracts\PersistenceInterface;
use App\Infrastructure\Persistence\Contracts\Request\ArgumentsInterface;
use App\Infrastructure\Persistence\Contracts\Request\NameInterface;
use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use League\Flysystem\FilesystemOperator;
use Override;

/**
 * @implements PersistenceInterface<NoSQLName, NoSQLArguments, NoSQLResponse>
 */
final readonly class NoSQLPersistence implements PersistenceInterface
{
    public function __construct(
        private FilesystemOperator $filesystem,
        private NoSQLBridge $bridge,
    ) {
    }

    private function template(NoSQLName $name): NoSQLTemplate
    {
        return new NoSQLTemplate($this->filesystem, $name);
    }

    private function request(NoSQLTemplate $template, NoSQLArguments $arguments): NoSQLRequest
    {
        return new NoSQLRequest($template, $arguments);
    }

    #[Override]
    public function response(NameInterface $name, ArgumentsInterface $arguments): ResponseInterface
    {
        $template = $this->template($name);

        $request = $this->request($template, $arguments);

        return $this->bridge->response($request);
    }
}
