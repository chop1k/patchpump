<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class PublishedCNA
{
    #[ODM\Field]
    private ?string $title = null;

    #[ODM\EmbedOne]
    private ?ContainerProvider $provider = null;

    /**
     * @var Collection<Description>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $descriptions = null;

    /**
     * @var Collection<Affected>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $affected = null;

    /**
     * @var Collection<CPEApplicability>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $cpeApplicability = null;

    /**
     * @var Collection<Problem>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $problems = null;

    /**
     * @var Collection<Reference>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $references = null;

    /**
     * @var Collection<Metric>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $metrics = null;

    /**
     * @var Collection<Timeline>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $timeline = null;

    /**
     * @var Collection<Credit>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $credits = null;

    #[ODM\Field]
    private ?array $source = null;

    /**
     * @var string[]|null
     */
    #[ODM\Field(type: 'collection')]
    private ?array $tags = null;

    /**
     * @var Collection<int, TaxonomyMapping>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $taxonomyMappings = null;

    #[ODM\Field]
    private ?\DateTimeImmutable $publicAt = null;

    #[ODM\Field]
    private ?\DateTimeImmutable $assignedAt = null;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getProvider(): ?ContainerProvider
    {
        return $this->provider;
    }

    public function setProvider(?ContainerProvider $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    public function getDescriptions(): ?Collection
    {
        return $this->descriptions;
    }

    public function setDescriptions(?Collection $descriptions): self
    {
        $this->descriptions = $descriptions;

        return $this;
    }

    public function getAffected(): ?Collection
    {
        return $this->affected;
    }

    public function setAffected(?Collection $affected): self
    {
        $this->affected = $affected;

        return $this;
    }

    public function getCpeApplicability(): ?Collection
    {
        return $this->cpeApplicability;
    }

    public function setCpeApplicability(?Collection $cpeApplicability): self
    {
        $this->cpeApplicability = $cpeApplicability;

        return $this;
    }

    public function getProblems(): ?Collection
    {
        return $this->problems;
    }

    public function setProblems(?Collection $problems): self
    {
        $this->problems = $problems;

        return $this;
    }

    public function getReferences(): ?Collection
    {
        return $this->references;
    }

    public function setReferences(?Collection $references): self
    {
        $this->references = $references;

        return $this;
    }

    public function getMetrics(): ?Collection
    {
        return $this->metrics;
    }

    public function setMetrics(?Collection $metrics): self
    {
        $this->metrics = $metrics;

        return $this;
    }

    public function getTimeline(): ?Collection
    {
        return $this->timeline;
    }

    public function setTimeline(?Collection $timeline): self
    {
        $this->timeline = $timeline;

        return $this;
    }

    public function getCredits(): ?Collection
    {
        return $this->credits;
    }

    public function setCredits(?Collection $credits): self
    {
        $this->credits = $credits;

        return $this;
    }

    public function getSource(): ?array
    {
        return $this->source;
    }

    public function setSource(?array $source): self
    {
        if (empty($source)) {
            $this->source = null;

            return $this;
        }

        $this->source = $source;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @param string[]|null $tags
     */
    public function setTags(?array $tags): self
    {
        if (empty($tags)) {
            $this->tags = null;

            return $this;
        }

        $this->tags = $tags;

        return $this;
    }

    public function getTaxonomyMappings(): ?Collection
    {
        return $this->taxonomyMappings;
    }

    public function setTaxonomyMappings(?Collection $taxonomyMappings): self
    {
        $this->taxonomyMappings = $taxonomyMappings;

        return $this;
    }

    public function getPublicAt(): ?\DateTimeImmutable
    {
        return $this->publicAt;
    }

    public function setPublicAt(?\DateTimeImmutable $publicAt): self
    {
        $this->publicAt = $publicAt;

        return $this;
    }

    public function getAssignedAt(): ?\DateTimeImmutable
    {
        return $this->assignedAt;
    }

    public function setAssignedAt(?\DateTimeImmutable $assignedAt): self
    {
        $this->assignedAt = $assignedAt;

        return $this;
    }
}