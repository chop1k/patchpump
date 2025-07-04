<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use App\Persistence\Enum\CVE\DescriptionType;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class Description
{
    #[ODM\Field]
    private ?int $type = null;

    #[ODM\Field]
    private ?string $language = null;

    #[ODM\Field]
    private ?string $content = null;

    /**
     * @var Collection<DescriptionMedia>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $media = null;

    public function getType(): ?DescriptionType
    {
        return DescriptionType::from($this->type);
    }

    public function setType(?DescriptionType $type): self
    {
        if ($type === null) {
            $this->type = null;

            return $this;
        }

        $this->type = $type->value;

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

    public function getMedia(): ?Collection
    {
        return $this->media;
    }

    public function setMedia(?Collection $media): self
    {
        $this->media = $media;

        return $this;
    }
}