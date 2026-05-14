<?php

namespace App\Infrastructure\Persistence\Storage\SQL\Contracts\Request;

/**
 * @template T
 */
interface SQLTemplateInterface
{
    /**
     * @return T
     */
    public function value();
}
