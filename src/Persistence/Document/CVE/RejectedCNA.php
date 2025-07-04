<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

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
     * @var Collection<Description>|null
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

    public function getReplacedBy(): ?array
    {
        return $this->replacedBy;
    }

    public function setReplacedBy(?array $replacedBy): self
    {
        $this->replacedBy = $replacedBy;

        return $this;
    }

    public function getReasons(): ?Collection
    {
        return $this->reasons;
    }

    public function setReasons(?Collection $reasons): self
    {
        $this->reasons = $reasons;

        return $this;
    }
}