<?php

declare(strict_types=1);

namespace App\Persistence\Entity;

use App\Persistence\Entity\Vulnerability\Vulnerability;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
final class Program
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Embedded(class: Version::class, columnPrefix: 'version_')]
    private ?Version $version = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $managed_by = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $type = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $verified_at = null;

    /**
     * @var Collection<int, Vulnerability>
     */
    #[ORM\ManyToMany(targetEntity: Vulnerability::class, inversedBy: 'affected_programs')]
    private Collection $vulnerabilities;


    public function __construct()
    {
        $this->created_at = Carbon::now()->toDateTimeImmutable();
        $this->vulnerabilities = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function getVersion(): ?Version
    {
        return $this->version;
    }

    public function setVersion(Version $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getManagedBy(): ?int
    {
        return $this->managed_by;
    }

    public function setManagedBy(int $managed_by): self
    {
        $this->managed_by = $managed_by;

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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function getVerifiedAt(): ?\DateTimeImmutable
    {
        return $this->verified_at;
    }

    public function setVerifiedAt(\DateTimeImmutable $verified_at): self
    {
        $this->verified_at = $verified_at;

        return $this;
    }

    /**
     * @return Collection<int, Vulnerability>
     */
    public function getVulnerabilities(): Collection
    {
        return $this->vulnerabilities;
    }
}
