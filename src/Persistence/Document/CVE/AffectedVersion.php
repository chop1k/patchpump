<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use App\Persistence\Enum\CVE\AffectionStatus;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class AffectedVersion
{
    #[ODM\Field]
    private ?string $version = null;

    #[ODM\Field]
    private ?string $type = null;

    #[ODM\Field]
    private ?int $status = null;

    #[ODM\Field]
    private ?string $lessThan = null;

    #[ODM\Field]
    private ?string $lessThanOrEqual = null;

    /**
     * @var Collection<AffectedVersionChange>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $changes = null;

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getStatus(): ?AffectionStatus
    {
        return AffectionStatus::from($this->status);
    }

    public function setStatus(?AffectionStatus $status): self
    {
        if ($status === null) {
            $this->status = null;

            return $this;
        }

        $this->status =  $status->value;

        return $this;
    }

    public function getLessThan(): ?string
    {
        return $this->lessThan;
    }

    public function setLessThan(?string $lessThan): self
    {
        $this->lessThan = $lessThan;

        return $this;
    }

    public function getLessThanOrEqual(): ?string
    {
        return $this->lessThanOrEqual;
    }

    public function setLessThanOrEqual(?string $lessThanOrEqual): self
    {
        $this->lessThanOrEqual = $lessThanOrEqual;

        return $this;
    }

    public function getChanges(): ?Collection
    {
        return $this->changes;
    }

    public function setChanges(?Collection $changes): self
    {
        $this->changes = $changes;

        return $this;
    }
}