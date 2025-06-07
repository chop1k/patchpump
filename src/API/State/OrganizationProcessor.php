<?php

namespace App\API\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\Metadata\Post;
use ApiPlatform\State\ProcessorInterface;

class OrganizationProcessor implements ProcessorInterface
{
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        dump($data, $operation, $uriVariables, $context);

        if ($operation instanceof Post) {

        }
    }
}
