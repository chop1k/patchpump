<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL\Bridge;

use App\Infrastructure\Persistence\Contracts\BridgeInterface;
use App\Infrastructure\Persistence\Contracts\RequestInterface;
use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use App\Infrastructure\Persistence\Storage\SQL\SQLRequest;
use App\Infrastructure\Persistence\Storage\SQL\SQLResponse;
use Exception;
use Override;

/**
 * @implements BridgeInterface<SQLRequest, SQLResponse>
 */
final readonly class PostgresBridge implements BridgeInterface
{
    public function __construct(
        private mixed $db,
    ) {
    }

    /**
     * @throws Exception
     */
    #[Override]
    public function response(RequestInterface $request): ResponseInterface
    {
        $template = $request->template();
        $params = $request->value();

        $result = pg_query_params($this->db, $template, $params);

        if (false === $result) {
            // todo: normal exception
            throw new Exception('123');
        }

        $results = pg_fetch_all($result) ?: [];

        return new SQLResponse();
    }
}
