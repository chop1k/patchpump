<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 */
#[ODM\EmbeddedDocument]
class DescriptionMedia
{
    #[ODM\Field]
    private ?string $type = null;

    #[ODM\Field]
    private ?bool $base64 = null;

    #[ODM\Field]
    private ?string $content = null;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBase64(): ?bool
    {
        return $this->base64;
    }

    public function setBase64(?bool $base64): self
    {
        $this->base64 = $base64;

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
