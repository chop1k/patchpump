<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use App\Persistence\Enum\CVE\AffectionStatus;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class AffectedVersionChange
{
    #[ODM\Field]
    private ?string $at = null;

    #[ODM\Field]
    private ?int $status = null;

    public function getAt(): ?string
    {
        return $this->at;
    }

    public function setAt(?string $at): self
    {
        $this->at = $at;

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

        $this->status = $status->value;

        return $this;
    }
}