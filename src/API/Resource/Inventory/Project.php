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

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/projects.{_format}',
        ),
        new Post(
            uriTemplate: '/projects.{_format}',
        ),
        new Get(
            uriTemplate: '/projects/{project_id}.{_format}',
            uriVariables: [
                'project_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Project::class,
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/projects/{project_id}.{_format}',
            uriVariables: [
                'project_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Project::class,
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/projects/{project_id}.{_format}',
            uriVariables: [
                'project_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Project::class,
                ),
            ]
        ),
    ]
)]
final class Project
{
    private ?string $name = null;

    private ?string $description = null;

    /**
     * @var User[]
     */
    private array $employees = [];

    /**
     * @var Active[]
     */
    private array $actives = [];

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

    public function setName(?string $name): self
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
     * @return Active[]
     */
    public function getActives(): array
    {
        return $this->actives;
    }

    /**
     * @param Active[] $actives
     */
    public function setActives(array $actives): self
    {
        $this->actives = $actives;

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
