<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class ContainerProvider
{
    #[ODM\Field]
    private ?string $orgId = null;

    #[ODM\Field]
    private ?string $orgName = null;

    #[ODM\Field]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getOrgId(): ?string
    {
        return $this->orgId;
    }

    public function setOrgId(?string $orgId): self
    {
        $this->orgId = $orgId;

        return $this;
    }

    public function getOrgName(): ?string
    {
        return $this->orgName;
    }

    public function setOrgName(?string $orgName): self
    {
        $this->orgName = $orgName;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}