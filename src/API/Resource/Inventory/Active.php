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
use App\API\Resource\User\User;
use App\Domain\Inventory\ActiveType;

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/actives.{_format}',
        ),
        new Post(
            uriTemplate: '/actives.{_format}',
        ),
        new Get(
            uriTemplate: '/actives/{active_id}.{_format}',
            uriVariables: [
                'active_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Active::class,
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/actives/{active_id}.{_format}',
            uriVariables: [
                'active_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Active::class,
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/actives/{active_id}.{_format}',
            uriVariables: [
                'active_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Active::class,
                ),
            ]
        ),
    ]
)]
final class Active
{
    private ?string $name = null;

    private ?string $description = null;

    private ?ActiveType $type = null;

    /**
     * @var Program[]
     */
    private array $programs = [];

    /**
     * @var User[]
     */
    private array $maintainers = [];

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

    public function getType(): ?ActiveType
    {
        return $this->type;
    }

    public function setType(?ActiveType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Program[]
     */
    public function getPrograms(): array
    {
        return $this->programs;
    }

    /**
     * @param Program[] $programs
     */
    public function setPrograms(array $programs): self
    {
        $this->programs = $programs;

        return $this;
    }

    /**
     * @return User[]
     */
    public function getMaintainers(): array
    {
        return $this->maintainers;
    }

    /**
     * @param User[] $maintainers
     */
    public function setMaintainers(array $maintainers): self
    {
        $this->maintainers = $maintainers;

        return $this;
    }
}
