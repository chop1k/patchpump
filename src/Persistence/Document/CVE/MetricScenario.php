<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class MetricScenario
{
    #[ODM\Field]
    private ?string $language = null;

    #[ODM\Field]
    private ?string $content = null;

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
}