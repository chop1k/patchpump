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
            uriTemplate: '/users.{_format}'
        ),
        new Post(
            uriTemplate: '/users.{_format}',
        ),
        new Get(
            uriTemplate: '/users/{id}.{_format}',
            uriVariables: [
                'id' => new Link(
                    fromClass: User::class,
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/users/{id}.{_format}',
            uriVariables: [
                'id' => new Link(
                    fromClass: User::class,
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/users/{id}.{_format}',
            uriVariables: [
                'id' => new Link(
                    fromClass: User::class,
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/users/{id}.{_format}',
            uriVariables: [
                'id' => new Link(
                    fromClass: User::class,
                ),
            ]
        ),
    ]
)]
final class User
{
    private ?string $name = null;

    private ?string $email = null;

    /**
     * @var Contact[]
     */
    private array $contacts = [];

    /**
     * @var Role[]
     */
    private array $roles = [];

    public function __construct(
        private readonly string $id,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Contact[]
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }

    /**
     * @param Contact[] $contacts
     */
    public function setContacts(array $contacts): self
    {
        $this->contacts = $contacts;

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
