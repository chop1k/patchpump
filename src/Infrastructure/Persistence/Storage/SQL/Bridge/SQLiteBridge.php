<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL\Bridge;

use App\Infrastructure\Persistence\Contracts\BridgeInterface;
use App\Infrastructure\Persistence\Contracts\RequestInterface;
use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use App\Infrastructure\Persistence\Storage\SQL\SQLRequest;
use App\Infrastructure\Persistence\Storage\SQL\SQLResponse;
use League\Flysystem\FilesystemException;
use Override;
use SQLite3;

/**
 * @implements BridgeInterface<SQLRequest, SQLResponse>
 */
final readonly class SQLiteBridge implements BridgeInterface
{
    public function __construct(
        private SQLite3 $driver,
    ) {
    }

    /**
     * @throws FilesystemException
     */
    #[Override]
    public function response(RequestInterface $request): ResponseInterface
    {
        $template = $request->template();
        $parameters = $request->value();

        $statement = $this->driver->prepare($template);

        foreach ($parameters as $name => $parameter) {
            $name = sprintf(':%s', $name);

            $statement->bindParam($name, $parameter);
        }

        $result = $statement->execute();

        return new SQLResponse($result);
    }
}
