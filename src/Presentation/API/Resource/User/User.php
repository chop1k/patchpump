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
            uriTemplate: '/users.{_format}'
        ),
        new Post(
            uriTemplate: '/users.{_format}',
        ),
        new Get(
            uriTemplate: '/users/{name}.{_format}',
            uriVariables: [
                'name' => new Link(
                    toProperty: 'name',
                    fromClass: User::class
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/users/{name}.{_format}',
            uriVariables: [
                'name' => new Link(
                    toProperty: 'name',
                    fromClass: User::class
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/users/{name}.{_format}',
            uriVariables: [
                'name' => new Link(
                    toProperty: 'name',
                    fromClass: User::class
                ),
            ]
        ),
    ]
)]
final readonly class User
{
    public function __construct(
        /**
         * @var non-empty-string $name
         */
        public string $name,

        /**
         * @var non-empty-string $email
         */
        public string $email,

        /**
         * @var non-empty-array<non-negative-int, Role> $roles
         */
        public array $roles = [],

        /**
         * @var non-empty-array<non-negative-int, Contact> $contacts
         */
        public ?array $contacts = [],
    ) {
    }
}
