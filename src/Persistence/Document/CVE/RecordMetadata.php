<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use App\Persistence\Enum\CVE\RecordState;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 */
#[ODM\EmbeddedDocument]
class RecordMetadata
{
    #[ODM\Field]
    private ?int $serial = null;

    #[ODM\Field]
    private ?int $state = null;

    #[ODM\Field]
    private ?\DateTimeImmutable $publishedAt = null;

    #[ODM\Field]
    private ?\DateTimeImmutable $reservedAt = null;

    #[ODM\Field]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ODM\Field]
    private ?\DateTimeImmutable $rejectedAt = null;

    public function getSerial(): ?int
    {
        return $this->serial;
    }

    public function setSerial(?int $serial): self
    {
        $this->serial = $serial;

        return $this;
    }

    public function getState(): ?RecordState
    {
        return RecordState::from($this->state);
    }

    public function setState(?RecordState $state): self
    {
        if (null === $state) {
            $this->state = null;

            return $this;
        }

        $this->state = $state->value;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?\DateTimeImmutable $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getReservedAt(): ?\DateTimeImmutable
    {
        return $this->reservedAt;
    }

    public function setReservedAt(?\DateTimeImmutable $reservedAt): self
    {
        $this->reservedAt = $reservedAt;

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

    public function getRejectedAt(): ?\DateTimeImmutable
    {
        return $this->rejectedAt;
    }

    public function setRejectedAt(?\DateTimeImmutable $rejectedAt): self
    {
        $this->rejectedAt = $rejectedAt;

        return $this;
    }
}
