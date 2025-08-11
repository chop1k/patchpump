<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 */
#[ODM\EmbeddedDocument]
class PublishedCNA
{
    #[ODM\Field]
    private ?string $title = null;

    #[ODM\EmbedOne]
    private ?ContainerProvider $provider = null;

    /**
     * @var Collection<non-negative-int, Description>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $descriptions = null;

    /**
     * @var Collection<non-negative-int, Affected>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $affected = null;

    /**
     * @var Collection<non-negative-int, CPEApplicability>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $cpeApplicability = null;

    /**
     * @var Collection<non-negative-int, ProblemType>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $problems = null;

    /**
     * @var Collection<non-negative-int, Reference>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $references = null;

    /**
     * @var Collection<non-negative-int, Metric>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $metrics = null;

    /**
     * @var Collection<non-negative-int, Timeline>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $timeline = null;

    /**
     * @var Collection<non-negative-int, Credit>|null
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
     * @var Collection<non-negative-int, TaxonomyMapping>|null
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

    /**
     * @return Collection<non-negative-int, Description>|null
     */
    public function getDescriptions(): ?Collection
    {
        return $this->descriptions;
    }

    /**
     * @param Collection<non-negative-int, Description>|null $descriptions
     */
    public function setDescriptions(?Collection $descriptions): self
    {
        $this->descriptions = $descriptions;

        return $this;
    }

    /**
     * @return Collection<non-negative-int, Affected>|null
     */
    public function getAffected(): ?Collection
    {
        return $this->affected;
    }

    /**
     * @param Collection<non-negative-int, Affected>|null $affected
     */
    public function setAffected(?Collection $affected): self
    {
        $this->affected = $affected;

        return $this;
    }

    /**
     * @return Collection<non-negative-int, CPEApplicability>|null
     */
    public function getCpeApplicability(): ?Collection
    {
        return $this->cpeApplicability;
    }

    /**
     * @param Collection<non-negative-int, CPEApplicability>|null $cpeApplicability
     */
    public function setCpeApplicability(?Collection $cpeApplicability): self
    {
        $this->cpeApplicability = $cpeApplicability;

        return $this;
    }

    /**
     * @return Collection<non-negative-int, ProblemDescription>|null
     */
    public function getProblems(): ?Collection
    {
        return $this->problems;
    }

    /**
     * @param Collection<non-negative-int, ProblemDescription>|null $problems
     */
    public function setProblems(?Collection $problems): self
    {
        $this->problems = $problems;

        return $this;
    }

    /**
     * @return Collection<non-negative-int, Reference>|null
     */
    public function getReferences(): ?Collection
    {
        return $this->references;
    }

    /**
     * @param Collection<non-negative-int, Reference>|null $references
     */
    public function setReferences(?Collection $references): self
    {
        $this->references = $references;

        return $this;
    }

    /**
     * @return Collection<non-negative-int, Metric>|null
     */
    public function getMetrics(): ?Collection
    {
        return $this->metrics;
    }

    /**
     * @param Collection<non-negative-int, Metric>|null $metrics
     */
    public function setMetrics(?Collection $metrics): self
    {
        $this->metrics = $metrics;

        return $this;
    }

    /**
     * @return Collection<non-negative-int, Timeline>|null
     */
    public function getTimeline(): ?Collection
    {
        return $this->timeline;
    }

    /**
     * @param Collection<non-negative-int, Timeline>|null $timeline
     */
    public function setTimeline(?Collection $timeline): self
    {
        $this->timeline = $timeline;

        return $this;
    }

    /**
     * @return Collection<non-negative-int, Credit>|null
     */
    public function getCredits(): ?Collection
    {
        return $this->credits;
    }

    /**
     * @param Collection<non-negative-int, Credit>|null $credits
     */
    public function setCredits(?Collection $credits): self
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getSource(): ?array
    {
        return $this->source;
    }

    /**
     * @param array<string, mixed>|null $source
     */
    public function setSource(?array $source): self
    {
        if (empty($source)) {
            $this->source = null;

            return $this;
        }

        $this->source = $source;

        return $this;
    }

    /**
     * @return string[]|null
     */
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

    /**
     * @return Collection<TaxonomyMapping>|null
     */
    public function getTaxonomyMappings(): ?Collection
    {
        return $this->taxonomyMappings;
    }

    /**
     * @param Collection<non-negative-int, TaxonomyMapping>|null $taxonomyMappings
     */
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
