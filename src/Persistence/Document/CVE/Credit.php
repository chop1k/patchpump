<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use App\Persistence\Enum\CVE\CreditType;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 */
#[ODM\EmbeddedDocument]
class Credit
{
    #[ODM\Field]
    private ?string $language = null;

    #[ODM\Field]
    private ?string $user = null;

    #[ODM\Field]
    private ?int $type = null;

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

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getType(): ?CreditType
    {
        return CreditType::from($this->type);
    }

    public function setType(?CreditType $type): self
    {
        if (null === $type) {
            $this->type = null;

            return $this;
        }

        $this->type = $type->value;

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
