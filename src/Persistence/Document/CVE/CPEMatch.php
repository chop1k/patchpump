<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class CPEMatch
{
    #[ODM\Field]
    private ?bool $vulnerable = null;

    #[ODM\Field]
    private ?string $criteria = null;

    #[ODM\Field]
    private ?string $matchCriteriaId = null;

    #[ODM\Field]
    private ?string $versionStartExcluding = null;

    #[ODM\Field]
    private ?string $versionStartIncluding = null;

    #[ODM\Field]
    private ?string $versionEndExcluding = null;

    #[ODM\Field]
    private ?string $versionEndIncluding = null;

    public function getVulnerable(): ?bool
    {
        return $this->vulnerable;
    }

    public function setVulnerable(?bool $vulnerable): self
    {
        $this->vulnerable = $vulnerable;

        return $this;
    }

    public function getCriteria(): ?string
    {
        return $this->criteria;
    }

    public function setCriteria(?string $criteria): self
    {
        $this->criteria = $criteria;

        return $this;
    }

    public function getMatchCriteriaId(): ?string
    {
        return $this->matchCriteriaId;
    }

    public function setMatchCriteriaId(?string $matchCriteriaId): self
    {
        $this->matchCriteriaId = $matchCriteriaId;

        return $this;
    }

    public function getVersionStartExcluding(): ?string
    {
        return $this->versionStartExcluding;
    }

    public function setVersionStartExcluding(?string $versionStartExcluding): self
    {
        $this->versionStartExcluding = $versionStartExcluding;

        return $this;
    }

    public function getVersionStartIncluding(): ?string
    {
        return $this->versionStartIncluding;
    }

    public function setVersionStartIncluding(?string $versionStartIncluding): self
    {
        $this->versionStartIncluding = $versionStartIncluding;

        return $this;
    }

    public function getVersionEndExcluding(): ?string
    {
        return $this->versionEndExcluding;
    }

    public function setVersionEndExcluding(?string $versionEndExcluding): self
    {
        $this->versionEndExcluding = $versionEndExcluding;

        return $this;
    }

    public function getVersionEndIncluding(): ?string
    {
        return $this->versionEndIncluding;
    }

    public function setVersionEndIncluding(?string $versionEndIncluding): self
    {
        $this->versionEndIncluding = $versionEndIncluding;

        return $this;
    }
}