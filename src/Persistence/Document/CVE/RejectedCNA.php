<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 */
#[ODM\EmbeddedDocument]
class RejectedCNA
{
    #[ODM\EmbedOne]
    private ?ContainerProvider $provider = null;

    /**
     * @var string[]|null
     */
    #[ODM\Field(type: 'collection')]
    private ?array $replacedBy = null;

    /**
     * @var Collection<non-negative-int, Description>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $reasons = null;

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
     * @return string[]|null
     */
    public function getReplacedBy(): ?array
    {
        return $this->replacedBy;
    }

    public function setReplacedBy(?array $replacedBy): self
    {
        $this->replacedBy = $replacedBy;

        return $this;
    }

    /**
     * @return Collection<non-negative-int, Description>|null
     */
    public function getReasons(): ?Collection
    {
        return $this->reasons;
    }

    /**
     * @param Collection<non-negative-int, Description>|null $reasons
     */
    public function setReasons(?Collection $reasons): self
    {
        $this->reasons = $reasons;

        return $this;
    }
}
