<?php

declare(strict_types=1);

namespace App\Presentation\API\Request\Monitoring;

use App\Presentation\API\Request\Monitoring\DTP\CreateAgentDTP;
use Symfony\Component\HttpFoundation\Request;

final readonly class CreateAgentRequest
{
    public function __construct(
        private Request $request,
    ) {
    }

    public function dto(): CreateAgentDTP
    {
        $data = $this->request->getPayload();

        return new CreateAgentDTP(
            name: $data->get('name'),
            description: $data->get('description', null)
        );
    }
}
