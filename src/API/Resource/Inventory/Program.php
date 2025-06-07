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

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/programs.{_format}',
        ),
        new Post(
            uriTemplate: '/programs.{_format}',
        ),
        new Get(
            uriTemplate: '/programs/{program_id}.{_format}',
            uriVariables: [
                'program_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Program::class,
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/programs/{program_id}.{_format}',
            uriVariables: [
                'program_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Program::class,
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/programs/{program_id}.{_format}',
            uriVariables: [
                'program_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Program::class,
                ),
            ]
        ),
    ]
)]
final class Program
{
    private ?string $name = null;

    private ?string $version = null;

    private ?string $type = null;

    private ?string $description = null;

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

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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
}
