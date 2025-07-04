<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document]
class Record
{
    #[ODM\Id(strategy: 'NONE')]
    private ?string $id = null;

    #[ODM\EmbedOne]
    private ?RecordMetadata $metadata = null;

    #[ODM\EmbedOne]
    private ?RecordAssigner $assigner = null;

    #[ODM\EmbedOne]
    private ?RejectedCNA $rejectedCNA = null;

    #[ODM\EmbedOne]
    private ?PublishedCNA $publishedCNA = null;

    /**
     * @var Collection<ADP>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $adp = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getMetadata(): ?RecordMetadata
    {
        return $this->metadata;
    }

    public function setMetadata(?RecordMetadata $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function getAssigner(): ?RecordAssigner
    {
        return $this->assigner;
    }

    public function setAssigner(?RecordAssigner $assigner): self
    {
        $this->assigner = $assigner;

        return $this;
    }

    public function getRejectedCNA(): ?RejectedCNA
    {
        return $this->rejectedCNA;
    }

    public function setRejectedCNA(?RejectedCNA $rejectedCNA): self
    {
        $this->rejectedCNA = $rejectedCNA;

        return $this;
    }

    public function getPublishedCNA(): ?PublishedCNA
    {
        return $this->publishedCNA;
    }

    public function setPublishedCNA(?PublishedCNA $publishedCNA): self
    {
        $this->publishedCNA = $publishedCNA;

        return $this;
    }

    public function getAdp(): ?Collection
    {
        return $this->adp;
    }

    public function setAdp(?Collection $adp): self
    {
        $this->adp = $adp;

        return $this;
    }
}