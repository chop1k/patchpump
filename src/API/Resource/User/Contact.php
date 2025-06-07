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
use App\Persistence\Enum\ContactServiceType;

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/contacts.{_format}',
        ),
        new Post(
            uriTemplate: '/contacts.{_format}',
        ),
        new Get(
            uriTemplate: '/contacts/{contact_id}.{_format}',
            uriVariables: [
                'contact_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Contact::class,
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/contacts/{contact_id}.{_format}',
            uriVariables: [
                'contact_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Contact::class,
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/contacts/{contact_id}.{_format}',
            uriVariables: [
                'contact_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Contact::class,
                ),
            ]
        ),
    ]
)]
final class Contact
{
    private ?string $description = null;

    public function __construct(
        private readonly int $id,
        private readonly User $user,
        private ContactServiceType $type,
        private string $value,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): ContactServiceType
    {
        return $this->type;
    }

    public function setType(ContactServiceType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

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

    public function getUser(): User
    {
        return $this->user;
    }
}
