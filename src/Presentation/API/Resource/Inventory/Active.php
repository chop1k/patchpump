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
use App\Presentation\API\Resource\User\User;

/**
 * @psalm-api
 */
#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/actives.{_format}',
        ),
        new Post(
            uriTemplate: '/actives.{_format}',
        ),
        new Get(
            uriTemplate: '/actives/{active_name}.{_format}',
            uriVariables: [
                'active_name' => new Link(
                    fromProperty: 'shortName',
                    fromClass: Active::class,
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/actives/{active_name}.{_format}',
            uriVariables: [
                'active_name' => new Link(
                    fromProperty: 'shortName',
                    fromClass: Active::class,
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/actives/{active_name}.{_format}',
            uriVariables: [
                'active_name' => new Link(
                    fromProperty: 'shortName',
                    fromClass: Active::class,
                ),
            ]
        ),
    ]
)]
final readonly class Active
{
    public function __construct(
        /**
         * @var non-empty-string $shortName
         */
        public string $shortName,

        /**
         * @var non-empty-string $fullName
         */
        public string $fullName,

        /**
         * @var non-empty-string $type
         */
        public string $type,

        /**
         * @var non-empty-string|null $description
         */
        public ?string $description = null,

        /**
         * @var non-empty-array<non-negative-int, User>|null $maintainers
         */
        public ?array $maintainers = null,

        /**
         * @var non-empty-array<non-negative-int, Program>|null $programs
         */
        public ?array $programs = null,
    ) {
    }
}
