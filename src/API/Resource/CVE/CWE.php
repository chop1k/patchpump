<?php

declare(strict_types=1);

namespace App\API\Resource\CVE;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\API\Resource\CVE\DTO\Reference;

#[ApiResource(
    shortName: 'cwe',
    operations: [
        new GetCollection(
            uriTemplate: '/cwe',
        ),
        new Post(
            uriTemplate: '/cwe',
        ),
        new Get(
            uriTemplate: '/cwe-{cwe_id}.{_format}',
            uriVariables: [
                'cwe_id' => new Link(
                    fromProperty: 'id',
                    fromClass: CWE::class,
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/cwe-{cwe_id}.{_format}',
            uriVariables: [
                'cwe_id' => new Link(
                    fromProperty: 'id',
                    fromClass: CWE::class,
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/cwe-{cwe_id}.{_format}',
            uriVariables: [
                'cwe_id' => new Link(
                    fromProperty: 'id',
                    fromClass: CWE::class,
                ),
            ]
        ),
    ],
    routePrefix: '/vulnerabilities'
)]
final class CWE
{
    private ?string $description = null;

    /**
     * @var Reference[]
     */
    private array $references = [];

    public function __construct(
        private readonly int $id,
        private string $name,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
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
     * @return Reference[]
     */
    public function getReferences(): array
    {
        return $this->references;
    }

    /**
     * @param Reference[] $references
     */
    public function setReferences(array $references): self
    {
        $this->references = $references;

        return $this;
    }
}
