<?php

declare(strict_types=1);

namespace App\API\Resource\User;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;

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
final class Role
{
    private ?string $name = null;

    private ?string $description = null;

    private ?int $priority = null;

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

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }
}
