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
use App\Presentation\API\Resource\User\Role;
use App\Presentation\API\Resource\User\User;

/**
 * @psalm-api
 */
#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/projects.{_format}',
        ),
        new Post(
            uriTemplate: '/projects.{_format}',
        ),
        new Get(
            uriTemplate: '/projects/{project_name}.{_format}',
            uriVariables: [
                'project_name' => new Link(
                    fromProperty: 'shortName',
                    fromClass: Project::class,
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/projects/{project_name}.{_format}',
            uriVariables: [
                'project_name' => new Link(
                    fromProperty: 'shortName',
                    fromClass: Project::class,
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/projects/{project_id}.{_format}',
            uriVariables: [
                'project_name' => new Link(
                    fromProperty: 'shortName',
                    fromClass: Project::class,
                ),
            ]
        ),
    ]
)]
final readonly class Project
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
         * @var non-empty-array<non-negative-int, User> $members
         */
        public array $members,

        /**
         * @var non-empty-array<non-negative-int, Active> $actives
         */
        public array $actives,

        /**
         * @var non-empty-array<non-negative-int, Role> $roles
         */
        public array $roles,

        /**
         * @var non-empty-string|null $description
         */
        public ?string $description = null,
    ) {
    }
}
