<?php

namespace App\Infrastructure\Persistence\Contracts\Request;

/**
 * @template T
 */
interface TemplateInterface
{
    /**
     * @return T
     */
    public function value();
}
