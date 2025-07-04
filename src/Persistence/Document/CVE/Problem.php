<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class Problem
{
    #[ODM\Field]
    private ?int $index = null;

    #[ODM\Field]
    private ?string $language = null;

    #[ODM\Field]
    private ?string $content = null;

    #[ODM\Field]
    private ?string $cwe = null;

    #[ODM\Field]
    private ?string $type = null;

    /**
     * @var Collection<Reference>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $references = null;

    public function getIndex(): ?int
    {
        return $this->index;
    }

    public function setIndex(?int $index): self
    {
        $this->index = $index;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCwe(): ?string
    {
        return $this->cwe;
    }

    public function setCwe(?string $cwe): self
    {
        $this->cwe = $cwe;

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

    public function getReferences(): ?Collection
    {
        return $this->references;
    }

    public function setReferences(?Collection $references): self
    {
        $this->references = $references;

        return $this;
    }
}