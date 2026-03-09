<?php

declare(strict_types=1);

namespace App\Presentation\API\Resource\Inventory;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;

/**
 * @psalm-api
 */
#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/programs.{_format}',
        ),
        new Post(
            uriTemplate: '/programs.{_format}',
        ),
        new Get(
            uriTemplate: '/programs/{program_id}.{_format}',
            uriVariables: [
                'program_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Program::class,
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/programs/{program_id}.{_format}',
            uriVariables: [
                'program_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Program::class,
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/programs/{program_id}.{_format}',
            uriVariables: [
                'program_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Program::class,
                ),
            ]
        ),
    ]
)]
final readonly class Program
{
    public function __construct(
        public int $id,

        /**
         * @var non-empty-string $name
         */
        public string $name,

        /**
         * @var non-empty-string $version
         */
        public string $version,

        /**
         * @var non-empty-string $type
         */
        public string $type,

        /**
         * @var non-empty-string|null $type
         */
        public ?string $description = null,
    ) {
    }
}
