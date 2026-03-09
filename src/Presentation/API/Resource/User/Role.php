<?php

declare(strict_types=1);

namespace App\Presentation\API\Resource\User;

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
            uriTemplate: '/roles.{_format}',
        ),
        new Post(
            uriTemplate: '/roles.{_format}',
        ),
        new Get(
            uriTemplate: '/roles/{role_id}.{_format}',
            uriVariables: [
                'role_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Role::class
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/roles/{role_id}.{_format}',
            uriVariables: [
                'role_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Role::class
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/roles/{role_id}.{_format}',
            uriVariables: [
                'role_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Role::class
                ),
            ]
        ),
    ],
)]
final readonly class Role
{
    public function __construct(
        /**
         * @var non-empty-string $name
         */
        public string $name,

        /**
         * @var non-empty-array<non-negative-int, string> $permissions
         */
        public array $permissions,

        /**
         * @var non-empty-string|null $name
         */
        public ?string $description = null,
    ) {
    }
}
