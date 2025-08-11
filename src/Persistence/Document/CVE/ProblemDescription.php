<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 */
#[ODM\EmbeddedDocument]
class ProblemDescription
{
    #[ODM\Field]
    private ?string $language = null;

    #[ODM\Field]
    private ?string $content = null;

    #[ODM\Field]
    private ?string $cwe = null;

    #[ODM\Field]
    private ?string $type = null;

    /**
     * @var Collection<non-negative-int, Reference>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $references = null;

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
}
