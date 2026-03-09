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
use App\Presentation\API\State\OrganizationProcessor;
use App\Presentation\API\State\OrganizationProvider;

/**
 * @psalm-api
 */
#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/organizations.{_format}',
        ),
        new Post(
            uriTemplate: '/organizations.{_format}',
        ),
        new Get(
            uriTemplate: '/organizations/{organization_name}.{_format}',
            uriVariables: [
                'organization_name' => new Link(
                    fromProperty: 'shortName',
                    fromClass: Organization::class
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/organizations/{organization_name}.{_format}',
            uriVariables: [
                'organization_name' => new Link(
                    fromProperty: 'shortName',
                    fromClass: Organization::class
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/organizations/{organization_name}.{_format}',
            uriVariables: [
                'organization_name' => new Link(
                    fromProperty: 'shortName',
                    fromClass: Organization::class
                ),
            ]
        ),
    ],
    provider: OrganizationProvider::class,
    processor: OrganizationProcessor::class
)]
final readonly class Organization
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
         * @var non-empty-array<non-negative-int, Role> $roles
         */
        public array $roles,

        /**
         * @var non-empty-string|null $description
         */
        public ?string $description = null,

        /**
         * @var non-empty-array<non-negative-int, Project>|null $projects
         */
        public ?array $projects = null,
    ) {
    }
}
