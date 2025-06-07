<?php

declare(strict_types=1);

namespace App\API\Resource\Inventory;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\API\Resource\User\Role;
use App\API\Resource\User\User;
use App\API\State\OrganizationProcessor;
use App\API\State\OrganizationProvider;

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/organizations.{_format}',
        ),
        new Post(
            uriTemplate: '/organizations.{_format}',
        ),
        new Get(
            uriTemplate: '/organizations/{organization_id}.{_format}',
            uriVariables: [
                'organization_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Organization::class
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/organizations/{organization_id}.{_format}',
            uriVariables: [
                'organization_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Organization::class
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/organizations/{organization_id}.{_format}',
            uriVariables: [
                'organization_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Organization::class
                ),
            ]
        ),
    ],
    provider: OrganizationProvider::class,
    processor: OrganizationProcessor::class
)]
final class Organization
{
    private ?string $name = null;

    private ?string $description = null;

    /**
     * @var User[]
     */
    private array $employees = [];

    /**
     * @var Project[]
     */
    private array $projects = [];

    /**
     * @var Role[]
     */
    private array $roles = [];

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return User[]
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    /**
     * @param User[] $employees
     */
    public function setEmployees(array $employees): self
    {
        $this->employees = $employees;

        return $this;
    }

    /**
     * @return Project[]
     */
    public function getProjects(): array
    {
        return $this->projects;
    }

    /**
     * @param Project[] $projects
     */
    public function setProjects(array $projects): self
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * @return Role[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param Role[] $roles
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
